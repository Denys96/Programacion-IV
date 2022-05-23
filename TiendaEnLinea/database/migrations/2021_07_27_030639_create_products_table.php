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
            $table->integer('idproduct')->autoIncrement();
            $table->string('name');
            $table->string('code')->unique();
            $table->float('price');
            $table->string('size')->nullable();
            $table->string('description')->nullable();
            $table->integer('stock');
            $table->integer('id_category')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->index('id_category');
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
