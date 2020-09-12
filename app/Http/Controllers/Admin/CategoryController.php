<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return view('admin.categories.index')->with(compact('categories'));
    }

    //devuelve el formulario de registrto
    public function create(){
        return view('admin.categories.create');
    }
    //almacena la informacion
    public function store(Request $request){

        //si no se cumple las reglas devuelve todo
        $this->validate($request,Category::$rules,Category::$messages);
        //mass assigment
        Category::create($request->all());

        $notification = 'La categoira fue registrada exitosamente';

        return redirect('/admin/categories')->with(compact('notification'));
    }
    public function edit($id){
        //return "Mostrar $id";
        $category=Category::find($id);
        return view('admin.categories.edit')->with(compact('category'));
    }
    //almacena la informacion
    public function update(Request $request,$id){

        //si no se cumple las reglas devuelve todo
        $this->validate($request,Category::$rules,Category::$messages);
        //registra el categoria
        //para capturar todos los valores del formularo
        $category = Category::find($id);
        $category->update($request->all());
        $notification = 'La categoira fue actualizada exitosamente';
        return redirect('/admin/categories/'.$category->id.'/edit')->with(compact('notification'));
    }

    //eliminar informacion
    public function destroy(Request $request,$id){
        //para capturar todos los valores del formularo
        $category = Category::find($id);
        $category->delete();
        $notification = 'La categoira  fue eliminada exitosamente';
        return back()->with(compact('notification'));
    }
}
