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

            $table->string('name');
            $table->string('name_en');
            $table->longText('description')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('product_info')->nullable();
            $table->longText('product_info_en')->nullable();
            $table->longText('refund_and_return_policy')->nullable();
            $table->longText('refund_and_return_policy_en')->nullable();
            $table->longText('shipping_info')->nullable();
            $table->longText('shipping_info_en')->nullable();
            $table->string('sku');
            $table->bigInteger('price');
            $table->string('quantity');
            $table->integer('size')->nullable();
            $table->bigInteger('price_after_discount')->nullable();
            $table->string('min_stock')->default(1);

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
