<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->string('locale')->default('es');
            $table->text('title');
            $table->text('slug');
            $table->text('description')->nullable();
            $table->longText('full_description')->nullable();
            $table->string('author')->nullable();
            $table->text('img')->nullable();
            $table->integer('count_view')->default(0);
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
        Schema::dropIfExists('articles');
    }
}
