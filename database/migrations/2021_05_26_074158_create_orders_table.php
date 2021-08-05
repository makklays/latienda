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
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('hash_order')->nullable();
            $table->integer('d_order_status_id')->unsigned();
            $table->double('total_price', 8,2);
            $table->integer('count_products')->default(0);
            $table->integer('d_delivery_id')->unsigned();
            $table->integer('d_payment_id')->unsigned();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('provincia')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('zip')->nullable();
            $table->string('period')->nullable();
            $table->string('date')->nullable();
            $table->string('dedication')->nullable();
            $table->text('note')->nullable();
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
