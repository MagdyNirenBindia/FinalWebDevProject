<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback',function (Blueprint $table)
        {
          $table->increments('id');
          $table->integer('EventID');
          $table->integer('CustomerID');
          $table->integer('Rating');
          $table->string('Feedback');
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
      Schema::dropIfExists('feedback');

    }
}
