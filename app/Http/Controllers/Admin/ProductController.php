<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{   //devuelve la lista de los datos
    public function index(){
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));
    }

    //devuelve el formulario de registrto
    public function create(){
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));
    }
    //almacena la informacion
    public function store(Request $request){
        //array que contiene los mensaje de la validaciones de los campos
        $messages = [
            'name.required' => 'Es necesario el campo nombre',
            'name.min' => 'El nombre producto debe tener minimo 3 caracteres',
            'description.required' => 'Es necesario el campo descripcion',
            'description.max' => 'El campo solo permite un maximo de 200 caracteres',
            'price.required' => 'Es necesario el campo precio',
            'price.numeric' => 'El campo solo permite valores numericos',
            'price.min'=> 'No se permite valores negativos'
        ];
        //regal que contiene la validaciones de los campos
        $rules = [
            'name'=> 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        //si no se cumple las reglas devuelve todo
        $this->validate($request,$rules,$messages);

        //registra el producto
        //para capturar todos los valores del formularo
        //dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->category_id;
        $product->long_description = $request->input('long_description');
        $product->price = $request->input('price');
        $product->save();
        return redirect('/admin/products');
    }
    public function edit($id){
        //return "Mostrar $id";
        $product=Product::find($id);
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit')->with(compact('product','categories'));
    }
    //almacena la informacion
    public function update(Request $request,$id){
        //array que contiene los mensaje de la validaciones de los campos
        $messages = [
            'name.required' => 'Es necesario el campo nombre',
            'name.min' => 'El nombre producto debe tener minimo 3 caracteres',
            'description.required' => 'Es necesario el campo descripcion',
            'description.max' => 'El campo solo permite un maximo de 200 caracteres',
            'price.required' => 'Es necesario el campo precio',
            'price.numeric' => 'El campo solo permite valores numericos',
            'price.min'=> 'No se permite valores negativos'
        ];
        //regal que contiene la validaciones de los campos
        $rules = [
            'name'=> 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        //si no se cumple las reglas devuelve todo
        $this->validate($request,$rules,$messages);
        //registra el producto
        //para capturar todos los valores del formularo
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->category_id;
        $product->long_description = $request->input('long_description');
        $product->price = $request->input('price');
        $product->save();
        return redirect('/admin/products/'.$product->id.'/edit');
    }

    //eliminar informacion
    public function destroy(Request $request,$id){
        //registra el producto
        //para capturar todos los valores del formularo
        $product = Product::find($id);
        $product->delete();
        return back();
    }
}
