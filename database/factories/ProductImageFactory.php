<?php

use Faker\Generator as Faker;
use App\ProductImage;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        //imageUrl metodo que trae imagenes y como parametro alto y ancho de la foto
        'image' => $faker-> imageUrl(250,250),
        'product_id' => $faker->numberBetween(1,100)
    ];
});
