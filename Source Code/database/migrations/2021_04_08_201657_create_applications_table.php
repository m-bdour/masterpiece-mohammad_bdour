<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id('application_id');
            $table->longText('coverLetter')->nullable();
            $table->string('attachment')->nullable();
            $table->string('status')->nullable()->default('Pending');

            $table->unsignedBigInteger('User_id')->nullable();
            $table->foreign('User_id')->references('User_id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('Position_id')->nullable();
            $table->foreign('Position_id')->references('Position_id')->on('positions')->onDelete('cascade')->onUpdate('cascade');

            $table->unique(array('User_id', 'Position_id'));
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
        Schema::dropIfExists('applications');
    }
}
