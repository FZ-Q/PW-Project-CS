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
    Schema::create('menus', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('c_id')->unsigned();
      $table->string('name');
      $table->text('image');
      $table->text('description');
      $table->integer('price');
      $table->timestamps();
      $table->softDeletes($column = 'deleted_at', $precision = 0);
      $table->foreign('c_id')->references('id')->on('categories')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('menus');
  }
};
