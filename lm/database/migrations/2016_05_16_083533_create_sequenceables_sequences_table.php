<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSequenceablesSequencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sequence_sequenceable', function (Blueprint $table) {
            
            $table->integer('sequence_id')->unsigned();
            $table->integer('sequenceable_id')->unsigned();
            $table->integer('order')->unsigned();

            $table
                ->foreign('sequence_id')
                ->references('id')
                ->on('sequences')
                ->onDelete('cascade');

            $table
                ->foreign('sequenceable_id')
                ->references('id')
                ->on('sequenceables')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sequence_sequenceable');
    }
}
