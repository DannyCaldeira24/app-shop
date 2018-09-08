<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function userInfo($id){
        $user=User::find($id);
        return view('admin.infouser')->with(compact('user'));
    }
}
