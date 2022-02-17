<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('code')->index();
            $table->decimal('value', 18, 2)->unsigned()->nullable();
            $table->boolean('is_percent');
            $table->boolean('free_shipping')->nullable();
            $table->decimal('minimum_spend', 18, 2)->unsigned()->nullable();
            $table->decimal('maximum_spend', 18, 2)->unsigned()->nullable();
            $table->integer('usage_limit_per_coupon')->unsigned()->nullable();
            $table->integer('usage_limit_per_customer')->unsigned()->nullable();
            $table->integer('used')->default(0);
            $table->boolean('is_active');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('coupons');
    }
}
