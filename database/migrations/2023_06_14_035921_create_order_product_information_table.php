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
        Schema::create('order_product_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->string('category_name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('product_img')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('order_information')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product_information');
    }
};
