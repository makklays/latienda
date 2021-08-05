<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_delivery', function (Blueprint $table) {
            $table->id();
            $table->string('name_ru', 255);
            $table->string('name_en', 255);
            $table->string('name_es', 255);
            $table->text('description_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_es')->nullable();
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
        Schema::dropIfExists('d_delivery');
    }
}
