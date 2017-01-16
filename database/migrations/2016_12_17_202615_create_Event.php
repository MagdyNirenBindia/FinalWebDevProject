<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event',function($event){
          $event -> increments('id');
          $event -> integer('CreatorID');
          $event -> string('Name');
          $event -> integer('Ticket_Capacity');
          $event -> date('Start_Date');
          $event -> date('End_Date');
          $event -> date('Date');
          $event -> string('Location');
          $event -> string('Creator');
          $event -> string('Genre');
          $event -> string('Description');
          $event -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('event');
    }
}
