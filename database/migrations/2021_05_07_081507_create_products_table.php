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
            $table->string('sku')->unique()->nullable();
            $table->bigInteger('category_id')->unsigned()->default(0);
            $table->text('title');
            $table->text('slug');
            $table->text('description')->nullable();
            $table->longText('full_description')->nullable();
            $table->double('price', 8, 2)->default(0);
            $table->double('old_price', 8, 2)->default(0);
            $table->text('img')->nullable();
            $table->integer('quantity')->default(0);
            $table->text('note')->nullable();
            $table->enum('is_active', [0, 1])->default(1);
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
