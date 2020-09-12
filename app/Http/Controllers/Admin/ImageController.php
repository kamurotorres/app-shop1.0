<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use File;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($id){
        //buscamos primero el producto
        $product= Product::find($id);
        //trae todas la imagenes asociadas al producto
        //ordeby orden las imagenes de mayor menor
        $images = $product->images()->orderBy('featured','desc')->get();

    return view('admin.products.images.index')->with(compact('product','images'));
    }
    public function store(Request $request,$id){
        //guardar la imagen en nuestro proyecto
        //capturamos el archivo y lo guardamos en una variable
        $file = $request->file('photo');
        //guardamos la imagen en una carpeta dentro de public
        $path = public_path() . '/images/products';
        //tomamos id unico 9' + nombre del archivo que cargamos
        $fileName = uniqid() . $file->getClientOriginalName();
        //moves el arhcivo a la ruta
        $moved = $file->move($path,$fileName);

        //creamos una validacion para quie cuando se guarde el archivo se cree el registro
        if($moved){
            //crear 1 registro en la tabla product_images
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            //$productImage->featured = false;
            $productImage->product_id = $id;
            $productImage->save();
        }
        return back();
    }
    public function destroy( Request $request,$id){
        //eliminar el archiv
        $productImage = ProductImage::find($request->image_id);
        //validacion para si es url http no hacer nada
        if(substr($productImage->image,0,4) === "http"){
            //devuelva
            $deleted = true;
        } else{
            $fullPath = public_path() . '/images/products/' . $productImage->image;
            //dd($fullPath);
            $deleted = File::delete($fullPath);
        }
        //eliminar el registro de la base datos
        //si es true elimina el registro si no, no hace nada
        if($deleted){
            $productImage->delete();
        }
        return back();
    }

    public function select($id,$image){
        //solo puede existir una como favorito
        //desmarcar todas a false
        ProductImage::where('product_id',$id)->update([
            'featured' => false
        ]);

        //actulizamos la imgen por defecto como favorito
        $productImage = ProductImage::find($image);
        $productImage->featured = true;
        $productImage->save();
        return back();
    }
}
