<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CategoryController extends Controller
{
   public function index(){
    	$categories=Category::paginate(10);
    	return view('admin.categories.index')->with(compact('categories'));//listado
    }
    public function create(){
    	return view('admin.categories.create');//formulario de registro
    }
    public function store(Request $request){
    	//registrar el nuevo producto en la db
    	//dd($request->all());
    	//validar
    	$this->validate($request,Category::$rules,Category::$messages);
 		Category::create($request->all());

    	return redirect('/admin/categories');
    }
    public function edit($id){
    	//validar
    	$category=Category::find($id);
    	return view('admin.categories.edit')->with(compact('category'));//formulario de edicion
    }
    public function update(Request $request,$id){
    	
    	//dd($request->all());
    	//validar
    	$this->validate($request,Category::$rules,Category::$messages);
    	$category=Category::find($id);
    	$category->update($request->all());

    	return redirect('/admin/categories');
    }
    public function destroy(Request $request,$id){
    	
    	//dd($request->all());
    	$category=Category::find($id);
    	$category->delete();//Delete

    	return redirect('/admin/categories');
    }
}
