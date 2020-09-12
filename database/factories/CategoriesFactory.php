<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //ucfirst aplica mayuscula la primera letra
        'name'=> ucfirst($faker->word),
        'descripcion'=> $faker->sentence(5)
    ];
});
