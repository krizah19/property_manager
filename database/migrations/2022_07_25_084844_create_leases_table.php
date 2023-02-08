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
        Schema::create('leases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenants');
            $table->string('status');
            $table->string('properties');
            $table->string('unit');
            $table->string('type');
            $table->string('occupants');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('recurring_charges');
            $table->date('due_date');
            $table->string('rent');
            $table->string('deposit');
            $table->date('deposit_date');
            $table->string('emergency_contact');
            $table->string('co_signer');
            $table->string('notes');
            $table->string('agreement');
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
        Schema::dropIfExists('leases');
    }
};
