<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id('position_id');
            $table->string('name')->nullable();
            $table->string('cover')->nullable();
            $table->string('title')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('majors')->nullable();
            $table->string('type')->nullable();
            $table->string('address')->nullable();
            $table->string('attachment')->nullable();
            $table->string('city')->nullable()->default('null');
            $table->string('status')->nullable();
            $table->unsignedBigInteger('User_id');
            $table->longText('about')->nullable();
            $table->foreign('User_id')->references('User_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('positions');
    }
}
