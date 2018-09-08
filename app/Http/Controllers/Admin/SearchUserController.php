<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class SearchUserController extends Controller
{
    public function show(Request $request){
    	$query=$request->input('queryus');
    	$users=User::where('name','like',"%$query%")->orWhere('surname','like',"%$query%")->paginate(9);
    	if($users->count()==1){
    		$id=$users->first()->id;
    		return redirect("admin/users/$id");
    	}
    	return view('admin.show')->with(compact('users','query'));
    }
    public function data(){
    	$users=User::pluck('name');
    	return $users;
    }    
}
