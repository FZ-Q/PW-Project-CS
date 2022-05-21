<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('purchases', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('u_id')->unsigned();
      $table->integer('m_id')->unsigned();
      $table->integer('qty');
      $table->integer('price');
      $table->timestamps();
      $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('m_id')->references('id')->on('menus')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('purchases');
  }
};
