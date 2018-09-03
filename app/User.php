<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    public static $messages = [
        'name.required'=>'Es necesario ingresar un nombre para el usuario',
        'name.min'=>'El nombre del usuario debe tener al menos 3 caracteres',
        'direction.required'=>'El usuario debe tener alguna dirección',
        'direction.max'=>'La dirección no puede exceder los 400 caracteres',
        'password.current_password'=>'La contraseña que nos ha suministrado no se corresponde con su contraseña actual',
        'password.min'=>'La contraseña actual que nos ha suministrado es incorrecta porque no tiene al menos 6 caracteres de largo'
    ];
    public static $rules=[
        'name' => 'required|min:3',
        'direction' => 'required|max:400',
        'postal_code' => 'required',
        'password.required' => 'Debe suministrar su contraseña actual',
        'password' => 'required|min:6|current_password'
    ];
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'direction', 'postal_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carts(){
       return $this->hasMany(Cart::class); 
    }
    //cart_id
    public function getCartAttribute(){
        $cart=$this->carts()->where('status','Active')->first();
        if($cart)
            return $cart;
        //else
        $cart = new Cart();
        $cart->status = 'Active';
        $cart->user_id = $this->id;
        $cart->save();

        return $cart->id;
    }
}
