<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    public function welcome(){
        //has para saber que la categoria tenga minimamente un producto asociado
        $categories = Category::has('products')->paginate(9);
        return view('welcome')-> with(compact('categories'));
    }
}
