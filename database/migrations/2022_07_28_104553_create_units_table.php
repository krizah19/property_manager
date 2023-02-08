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
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('property');
            $table->string('unit_number');
            $table->mediumText('photo')->nullable();
            $table->string('status')->nullable();
            $table->string('size');
            $table->string('rooms');
            $table->string('bathroom');
            $table->string('features');
            $table->string('market_rent');
            $table->string('rental_amount');
            $table->string('deposit_amount');
            $table->string('description');
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
        Schema::dropIfExists('units');
    }
};
