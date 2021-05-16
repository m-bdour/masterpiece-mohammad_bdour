<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('majors', function (Blueprint $table) {
            $table->id('major_id');
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('title')->nullable();
            $table->string('major')->nullable();
            $table->string('Ename')->nullable();
            $table->text('about')->nullable();
            $table->text('sectors')->nullable();
            $table->text('skills')->nullable();
            $table->text('courses')->nullable();
            $table->text('findJob')->nullable();
            $table->text('education')->nullable();
            $table->text('references')->nullable();
            $table->string('image')->nullable()->default('defaultMajor.png');
            $table->string('cover')->nullable()->default('defultBack.jpg');

            $table->unsignedBigInteger('college_id')->nullable();
            $table->foreign('college_id')->references('college_id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('majors');
    }
}
