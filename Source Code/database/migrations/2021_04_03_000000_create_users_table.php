<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('name')->nullable()->default('User');
            $table->string('lname')->nullable();
            $table->string('image')->nullable()->default('defaultProfile.png');
            $table->string('coverImage')->nullable()->default('defultBack.jpg');
            $table->string('title')->nullable();
            $table->longText('skills')->nullable();
            $table->string('nationality')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('twitter')->nullable();
            $table->string('behance')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('uni')->nullable();
            $table->longText('about')->nullable();
            $table->string('cv')->nullable();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('major_id')->nullable();
            $table->foreign('major_id')->references('major_id')->on('majors')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
