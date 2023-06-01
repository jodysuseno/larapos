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
        Schema::create('carts', function (Blueprint $table) {
            $table->id('cart_id');
            $table->unsignedBigInteger('sale_id');
            // $table->string('invoice_sale');
            $table->unsignedBigInteger('item_id');
            $table->integer('qty');
            $table->integer('price_item');
            $table->timestamps();
            $table->foreign('sale_id')->references('sale_id')->on('sales')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('invoice_sale')->references('invoice')->on('sales')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
