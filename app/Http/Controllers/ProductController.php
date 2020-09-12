<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id){
        $product = Product::find($id);
        $images = $product->images;
        //dos colecciones para almacenar valores diferentes
        $imagesLeft=collect();
        $imagesRight= collect();

        foreach ($images as $indice => $image){
            if($indice%2==0){
                $imagesLeft->push($image);
            }else{
                $imagesRight->push($image);
            }
        }
        return view('products.show')->with(compact('product','imagesRight','imagesLeft'));
    }
}
