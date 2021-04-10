<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('date_time')->nullable();
            $table->string('complaints')->nullable();
            $table->string('treatment')->nullable();
            $table->string('medication')->nullable();
            $table->string('treatment_fee')->nullable();
            $table->string('resit_no')->nullable();
            $table->string('queue_no')->nullable();
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
