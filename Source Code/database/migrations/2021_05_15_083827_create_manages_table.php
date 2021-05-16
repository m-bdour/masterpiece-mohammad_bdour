<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manages', function (Blueprint $table) {
            $table->id();
            $table->string('homedescription')->nullable();
            $table->string('hometitle')->nullable();            
            $table->string('lifetitle')->nullable();            
            $table->string('homeimage')->nullable()->default('defultBack.png');
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('homekeywords')->nullable();
            $table->string('lifekeywords')->nullable();
            $table->string('lifedescription')->nullable();
            $table->text('contactinfo')->nullable();
            $table->text('hometopdiscription')->nullable();
            $table->text('homebottomdiscription')->nullable();
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
        Schema::dropIfExists('manages');
    }
}
