<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uni_majors', function (Blueprint $table) {
            $table->id('uni_major_id');

            $table->unsignedBigInteger('major_id')->nullable();
            $table->foreign('major_id')->references('major_id')->on('majors')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('university_id')->nullable();
            $table->foreign('university_id')->references('university_id')->on('universities')->onDelete('cascade')->onUpdate('cascade');


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
        Schema::dropIfExists('uni_majors');
    }
}
