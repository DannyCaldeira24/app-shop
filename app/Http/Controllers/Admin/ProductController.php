<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    public function index(){
    	$products=Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));//listado
    }
    public function create(){
        $categories=Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories'));//formulario de registro
    }
    public function store(Request $request){
    	//registrar el nuevo producto en la db
    	//dd($request->all());
    	//validar
    	$this->validate($request,Product::$rules,Product::$messages);
    	$product=new Product();
    	$product->name=$request->input('name');
    	$product->description=$request->input('description');
    	$product->price=$request->input('price');
    	$product->long_description=$request->input('long_description');
        $product->category_id=$request->category_id;
    	$product->save();//INSERT

    	return redirect('/admin/products');
    }
    public function edit($id){
    	//validar
        $categories=Category::orderBy('name')->get();
    	$product=Product::find($id);
    	return view('admin.products.edit')->with(compact('product','categories'));//formulario de edicion
    }
    public function update(Request $request,$id){
    	//registrar el nuevo producto en la db
    	//dd($request->all());
    	//validar
        $this->validate($request,Product::$rules,Product::$messages);
    	$product=Product::find($id);
    	$product->name=$request->input('name');
    	$product->description=$request->input('description');
    	$product->price=$request->input('price');
        $product->category_id=$request->category_id;
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
