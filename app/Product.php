<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Category;

class Product extends Model
{
    //producto solo pertenece a una categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function getFeaturedImageUrlAttribute(){
        //creamos un variable para saber la foto favorita
        //sobre el producto traer la primera imagen con el valor true del favorito
        $featuredImage= $this->images()->where('featured',true)->first();

        if(!$featuredImage){
            //si es falso (ose si no tiene faovrito) entoce tomar la primera imagen
            $featuredImage = $this->images()->first();
        }
        if($featuredImage){
            //retorna la url del otro accesor o metodo creado images
            return $featuredImage->url;
        }
        return '/images/products/default.png';
    }

    public function  getCategoryNameAttribute(){
        if($this->category){
            return $this->category->name;
        }
        else{
            return "General";
        }
    }
}
