<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerPastExprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_past_exprs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('f_id');
            $table->foreign('f_id')->references('id')->on('freelancers')->onDelete('cascade');
            $table->string('job_position');
            $table->string('Company_Name');
            $table->string('location');
            $table->string('joining_date');
            $table->string('leaving_date');
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
        Schema::dropIfExists('freelancer_past_exprs');
    }
}
