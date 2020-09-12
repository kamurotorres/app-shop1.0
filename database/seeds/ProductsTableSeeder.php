<?php

use Illuminate\Database\Seeder;
//importamos la clase Prodcto
use App\Product;
use App\ProductImage;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //por cada modelo tenemos una fabrica que genera
        //datos ficticcios
       // factory(Product::class,100)->create();
        //factory(ProductImage::class,200)->create();
        //1.creamos las 5 categorias
        $categories = factory(Category::class,5)->create();        //
        $categories->each(function ($category){
            //por cada categoria creamos 20 producto
            $products = factory(Product::class,20)->make();
            //savemany para guardar una coleccion
            //con tagoria accdemos a los producto y guardmos la coleccion de producto
            $category->products()->saveMany($products);
            //despues recoremos los producto con for
            $products -> each(function($p){ 
                //creamos 5 imagenes para cada producto
                $images  = factory(ProductImage::class,5)->make();
                // usamos metodo del modelo para agregarle 5 imagenes cada producto
                $p->images()->saveMany($images);
            });
        });

    }
}
