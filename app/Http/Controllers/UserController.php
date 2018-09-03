<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Hash;

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
}
