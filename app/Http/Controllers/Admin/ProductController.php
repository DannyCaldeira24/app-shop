<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
    	$products=Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));//listado
    }
    public function create(){
    	return view('admin.products.create');//formulario de registro
    }
    public function store(Request $request){
    	//registrar el nuevo producto en la db
    	//dd($request->all());
    	//validar
    	$messages = [
    		'name.required'=>'Es necesario ingresar un nombre para el producto',
    		'name.min'=>'El nombre del producto debes tener al menos 3 caracteres',
    		'description.required'=>'El producto debe tener alguna descripción',
    		'description.max'=>'La descripcion corta no puede exceder los 200 caracteres',
    		'price.required'=>'El producto debe tener un precio',
    		'price.numeric'=>'El producto debe tener un precio valido, no acepta comas ni puntos',
    		'price.min'=>'No se admiten precios negativos'
    	];
    	$rules=[
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];
    	$this->validate($request,$rules,$messages);
    	$product=new Product();
    	$product->name=$request->input('name');
    	$product->description=$request->input('description');
    	$product->price=$request->input('price');
    	$product->long_description=$request->input('long_description');
    	$product->save();//INSERT

    	return redirect('/admin/products');
    }
    public function edit($id){
    	//validar
    	$product=Product::find($id);
    	return view('admin.products.edit')->with(compact('product'));//formulario de edicion
    }
    public function update(Request $request,$id){
    	//registrar el nuevo producto en la db
    	//dd($request->all());
    	//validar
    	$messages = [
    		'name.required'=>'Es necesario ingresar un nombre para el producto',
    		'name.min'=>'El nombre del producto debes tener al menos 3 caracteres',
    		'description.required'=>'El producto debe tener alguna descripción',
    		'description.max'=>'La descripcion corta no puede exceder los 200 caracteres',
    		'price.required'=>'El producto debe tener un precio',
    		'price.numeric'=>'El producto debe tener un precio valido, no acepta comas ni puntos',
    		'price.min'=>'No se admiten precios negativos'
    	];
    	$rules=[
    		'name' => 'required|min:3',
    		'description' => 'required|max:200',
    		'price' => 'required|numeric|min:0'
    	];
    	$this->validate($request,$rules,$messages);
    	$product=Product::find($id);
    	$product->name=$request->input('name');
    	$product->description=$request->input('description');
    	$product->price=$request->input('price');
    	$product->long_description=$request->input('long_description');
    	$product->save();//UPDATE

    	return redirect('/admin/products');
    }
    public function destroy(Request $request,$id){
    	//registrar el nuevo producto en la db
    	//dd($request->all());
    	$product=Product::find($id);
    	$product->delete();//Delete

    	return redirect('/admin/products');
    }
    
}
