<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomreservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomreservation', function (Blueprint $table) {
            $table->id();
            $table->string('RoomNo');
            $table->string('slug');
            $table->string('profile')->default('room.jpg');
            $table->string('name');
            $table->double('price');
            $table->bigInteger('capacity');
            $table->longText('description');
            $table->tinyInteger('status')->comment('0=unvailable, 1=checkin, 2=checkout')->default(0);
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
        Schema::dropIfExists('roomreservation');
    }
}
