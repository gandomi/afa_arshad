<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('stu_num');
            $table->string('field');
            $table->text('memo')->nullable();
            $table->integer('priority_1')->unsigned()->nullable();
            $table->integer('priority_2')->unsigned()->nullable();
            $table->integer('priority_3')->unsigned()->nullable();
            $table->integer('priority_4')->unsigned()->nullable();
            $table->integer('priority_5')->unsigned()->nullable();
            $table->integer('priority_6')->unsigned()->nullable();
            $table->integer('priority_7')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('priority_1')->references('id')->on('teachers');
            $table->foreign('priority_2')->references('id')->on('teachers');
            $table->foreign('priority_3')->references('id')->on('teachers');
            $table->foreign('priority_4')->references('id')->on('teachers');
            $table->foreign('priority_5')->references('id')->on('teachers');
            $table->foreign('priority_6')->references('id')->on('teachers');
            $table->foreign('priority_7')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
