<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            // Relations to other models
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('itenable_id')->unsigned();
            $table->string('itenable_type');
            // Superclass attributes
            $table->string('name', 128);
            $table->text('summary');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->index('user_id');
            $table->index('category_id');
            $table->unique('itenable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
