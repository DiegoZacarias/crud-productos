<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('item_code');    
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('description');    
            $table->string('specifications')->nullable();
            $table->string('dimensions')->nullable();
            $table->integer('price');
            $table->integer('stock');
            $table->boolean('flag'); //para mostrar o no de acuerdo a la disponibilidad
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
