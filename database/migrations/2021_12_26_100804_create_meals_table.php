<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('components')->nullable();
            $table->double('price');
            $table->enum('size' , ["SM" , "MD" , "LG"])->default('MD');
            $table->boolean('is_sale')->default('0');
            $table->double('sales')->nullable();
            $table->double('calories')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_delivery')->default('0');

             $table->bigInteger('category_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('meals');
    }
}
