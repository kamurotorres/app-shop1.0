<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            //campos para agregar
            $table->string('name');
            $table->string('description');
            $table->text('long_description')->nullable();
            $table->float('price');
            //creacion de relacion con categorias
            //1.creamos la columna
            $table->integer('category_id')->unsigned()->nullable();
            //2.realizamos la realacion entre el campo y la tabla category
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
