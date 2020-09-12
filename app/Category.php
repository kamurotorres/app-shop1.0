<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Product;
class Category extends Model
{
    //agregar las validaciones al modelo
       public static $messages = [
            'name.required' => 'Es necesario el campo nombre',
            'name.min' => 'El nombre producto debe tener minimo 3 caracteres',
            'descripcion.required' => 'Es necesario el campo descripcion',
            'descripcion.max' => 'El campo solo permite un maximo de 200 caracteres',
        ];
            //regal que contiene la validaciones de los campos
        public static $rules = [
            'name'=> 'required|min:3',
            'descripcion' => 'required|max:200',
        ];

    //para capturar los campos de forma dinamica de un formulario
    protected $fillable=['name','descripcion'];

    //creamos una relacion de 1 mucho 
    //teniedo que una categoria puede 
    //tener muchos productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredProduct = $this->products()->first();
        return $featuredProduct->featured_image_url;
    }
}
