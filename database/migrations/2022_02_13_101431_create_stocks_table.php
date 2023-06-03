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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id('stock_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('supplier_id')->nullable($value = true);
            $table->unsignedBigInteger('user_id');
            $table->enum('type', ['in', 'out']);
            $table->string('detail');
            $table->integer('qty');
            $table->dateTime('date', $precision = 0);
            $table->timestamps();
            $table->foreign('item_id')->references('item_id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
