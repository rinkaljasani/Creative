<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelancerEduDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_edu_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('f_id');
            $table->foreign('f_id')->references('id')->on('freelancers')->onDelete('cascade');
            $table->string('collage');
            $table->string('course');
            $table->string('degree');
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
        Schema::dropIfExists('freelancer_edu_details');
    }
}
