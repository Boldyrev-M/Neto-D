<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('text');
            $table->string('name');
            $table->dateTime('created_at');
            $table->string('email');
            $table->string('answer')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('resolved')->nullable();
            $table->dateTime('deleted_at');
            $table->integer('status');
            $table->rememberToken();
            $table->timestamps();
        });
//        Schema::table('questions', function ($table){
//            $table->foreign('category_id')->references('category')->on('categories');//->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users');
//        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
