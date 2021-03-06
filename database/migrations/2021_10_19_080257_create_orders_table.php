<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('discount')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('total')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->enum('status', ['pending','confirmed','preparing',' awaiting_shipment','shipped','delivered','cancelled']);
            $table->longText('note')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
