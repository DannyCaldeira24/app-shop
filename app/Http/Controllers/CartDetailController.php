<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartDetail;
use App\Cart;
use Mail;
use App\Mail\NewOrder;

class CartDetailController extends Controller
{
    public function store(Request $request){

    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity=$request->quantity;
    	$cartDetail->save();
    	$notification = 'El producto se ha cargado a tu carrito de compras correctamente.';
    	return redirect('/home')->with(compact('notification'));
    }
    public function destroy(Request $request){

    	$cartDetail = CartDetail::find($request->cart_detail_id);
    	if($cartDetail->cart_id == auth()->user()->cart->id){
    		$cartDetail->delete();
    	    $notification = 'El producto se ha eliminado del carrito de compras correctamente.';
        }else{
            $notification="Ha ocurrido un error, no le corresponde eliminar este producto";
        }   
    	return back()->with(compact('notification'));
    }
    public function destroyorder(Request $request){
        $cartDetail = CartDetail::find($request->cart_detail_id);
        $cart_current=Cart::find($cartDetail->cart_id);
        if($cart_current->user_id == auth()->user()->id){
            $cartDetail->delete();
            $notification = 'El producto se ha eliminado de la orden correctamente.';
            $order_status=CartDetail::where('cart_id', $cart_current->id)->get();
            if($order_status->isEmpty()){
                $cart_current->status="Cancelado";
                $cart_current->save();
            }
        }else{
            $notification="Ha ocurrido un error, no le corresponde eliminar el producto de esta orden";
        }
        
        return back()->with(compact('notification'));   
    }
}
