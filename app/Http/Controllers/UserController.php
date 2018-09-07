<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Hash;
use App\Cart;
use Mail;
use App\CartDetail;
use App\Mail\Contact;

class UserController extends Controller
{
    public function index(){
    	return view('users.modify');	
    }
    public function image(){
    	return view('users.perfil.index');
    }
    public function edit(Request $request){
    	$this->validate($request,User::$rules,User::$messages);
    	$user = auth()->user();
    	$user->name=$request->input('name');
    	$user->surname=$request->input('surname');
    	$user->direction=$request->input('direction');
    	$user->postal_code=$request->input('postal_code');
    	$user->save();
        $notification = 'Se ha modificado los datos correctamente.';
        return redirect('/home')->with(compact('notification'));
    }
    public function showpassform(){
    	return view('users.perfil.pass');
    }
    public function update_avatar(Request $request){
    	$this->validate($request, [
	      'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
	    ]);
	 
	    $filename = auth()->user()->id.'_'.time().'.'.$request->avatar->getClientOriginalExtension();
	    $request->avatar->move(public_path('images/users'), $filename);
	 
	    $user = auth()->user();
	    $user->avatar = $filename;
	    $user->save();
	    $notification = 'Se ha actualizado su foto de perfil correctamente.';
        return redirect('/home')->with(compact('notification'));
    }
    public function update_password(Request $request){
        $this->validate($request, [
            'newpass' => 'min:6|confirmed',
            'password' => 'required|min:6|current_password'
        ],[
            'newpass.confirmed'=>'Las contraseñas nuevas deben ser iguales',
            'newpass.min'=>'La contraseña nueva debe tener al menos 6 caracteres de largo',
            'password.current_password'=>'La contraseña que nos ha suministrado no se corresponde con su contraseña actual',
            'password.required' => 'Debe suministrar su contraseña actual',
            'password.min'=>'La contraseña actual que nos ha suministrado es incorrecta porque no tiene al menos 6 caracteres de largo'
        ]);
    	//$this->validate($request,User::$rules,User::$messages);
    	$user = auth()->user();
		$user->Password = Hash::make($request->input('newpass'));
		$user->save();
        $notification = 'Ha modificado su contraseña correctamente.';
        return redirect('/home')->with(compact('notification'));
    }
    public function img_trans($id){
        $cart_id=$id;
        return view('users.img')->with(compact('cart_id'));
    }
    public function update_trans(Request $request){
        $cart = Cart::find($request->cart_id);
        if(auth()->user()->id == $cart->user_id){
            $this->validate($request, [
              'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
         
            $filename = auth()->user()->id.'_'.time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/carts'), $filename);

            $cart->order_trans = $filename;
            $cart->save();
            $notification = 'Se ha actualizado la imagen de su transferencia, pronto el administrador verificara la compra y pondra la orden de pendiente a Aceptado de no cometerse ninguna irregularidad y se le contactara por el correo que tenga asociado a su cuenta para la posterior entrega.';
        }else{
            $notification = 'Usted no puede subir una imagen a esa orden porque no le pertenece.';
        }
        return redirect('/home')->with(compact('notification'));
    }
    public function contact(Request $request){
        if(auth()->user()){
            $message=$request->input('message');
            Mail::to('dannyelportu2013@gmail.com')->send(new Contact(auth()->user(),$message));
            $notification = 'Gracias por escribirnos, nos pondremos en contacto con usted en la brevedad posible.';
            return redirect('/home')->with(compact('notification'));
        }else{
            return redirect('/login');
        }
    }
}
