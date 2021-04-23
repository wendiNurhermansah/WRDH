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
            $table->id();
            $table->string('nama')->unique();
            $table->bigInteger('categories_id')->unsigned();
            $table->bigInteger('brands_id')->unsigned();
            $table->integer('harga');
            $table->integer('stok');
            $table->string('foto')->nullable();
            $table->timestamps();

        });
        
        
        Schema::table('products', function (Blueprint $table){
            $table->foreign('categories_id')
            ->references('id')
            ->on('categories')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('brands_id')
            ->references('id')
            ->on('brands')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
