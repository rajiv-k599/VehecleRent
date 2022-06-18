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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('Bid')->autoIncrement();
            $table->string('email')->unique();
            $table->date('FromDate');
            $table->date('ToDate');
            $table->string('message');
            $table->integer('status');
            $table->integer('bookingNumber');
            $table->unsignedBigInteger('vehicleId');
            $table->foreign('vehicleId')->references('Vid')->on('vehicles');
            $table->unsignedBigInteger('Uid');
            $table->foreign('Uid')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
};
