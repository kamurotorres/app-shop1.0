<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function  getUrlAttribute(){
        //validamos si la imagen proviene de una ruta
        if(substr($this->image,0,4)=== "http"){
            return $this->image;
        }
        //o si viene de la carpeta public
        return '/images/products/' . $this->image;
    }
}
