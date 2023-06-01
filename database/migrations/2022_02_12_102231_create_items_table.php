<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id');
            $table->unsignedBigInteger('category_Id');
            $table->unsignedBigInteger('unit_id');
            $table->string('barcode')->unique();
            $table->string('name')->unique();
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps();
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('unit_id')->references('unit_id')->on('units')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
