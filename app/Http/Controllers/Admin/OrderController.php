<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cart;
use App\CartDetail;

class OrderController extends Controller
{
    public function show(){
    	$order_pending=Cart::where('status','Pendiente')->get();
    	$order_cancelled=Cart::where('status','Cancelado')->get();
    	$order_rejected=Cart::where('status','Rechazado')->get();
    	$order_accepted=Cart::where('status','Aceptado')->get();
    	$order_finish=Cart::where('status','Finalizado')->get();
    	return view('admin.orders.orders')->with(compact('order_pending','order_cancelled','order_rejected','order_accepted','order_finish'));
    }
    public function order($id){
        $order_info=Cart::find($id);
        return view('admin.orders.info')->with(compact('order_info'));
    }
    public function accept($id){
    	$order_accepted=Cart::find($id);
    	$order_accepted->status="Aceptado";
    	$order_accepted->save();
    	return back();
    }
    public function reject($id){
    	$order_reject=Cart::find($id);
    	$order_reject->status="Rechazado";
    	$order_reject->save();
    	return back();	
    }
    public function finish($id){
    	$order_accepted=Cart::find($id);
    	$order_accepted->status="Finalizado";
    	$order_accepted->save();
    	return back();
    }
}
