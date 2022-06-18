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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id('Vid')->autoIncrement();
            $table->integer("Vtype");
            $table->unsignedBigInteger("Brand");
            $table->string("Vname");
            $table->string("Model");
            $table->string("Vno");
            $table->char("Fuel",25);
            $table->integer("Capacity");
            $table->integer("Rate");
            $table->longText('Overview');
            $table->string("img1");
            $table->string("img2");
            $table->string("img3");
            $table->foreign('Brand')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('vehicles');
    }
};
