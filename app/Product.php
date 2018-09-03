<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $messages = [
        'name.required'=>'Es necesario ingresar un nombre para el producto',
        'name.min'=>'El nombre del producto debes tener al menos 3 caracteres',
        'description.required'=>'El producto debe tener alguna descripción',
        'description.max'=>'La descripcion corta no puede exceder los 200 caracteres',
        'price.required'=>'El producto debe tener un precio',
        'price.numeric'=>'El producto debe tener un precio valido, no acepta comas ni puntos',
        'price.min'=>'No se admiten precios negativos'
    ];
    public static $rules=[
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        'price' => 'required|numeric|min:0'
    ];
    //$product->category
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    //$product->images
    public function images(){
    	return $this->hasMany(ProductImage::class);
    }
    public function getFeaturedImageUrlAttribute(){
    	$featuredImage=$this->images()->where('featured',true)->first();
    	if(!$featuredImage)
    		$featuredImage=$this->images()->first();

    	if($featuredImage){
    		return $featuredImage->url;
    	}
    	//default
    	return '/images/products/noimage.jpeg';
    }
    public function  getCategoryNameAttribute(){
        if($this->category)
            return $this->category->name;

        return 'General';
    }
}
