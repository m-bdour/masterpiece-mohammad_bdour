<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('Date')->nullable();
            $table->string('time')->nullable();
            $table->string('page')->nullable();
            $table->string('pageLink')->nullable();
            $table->longText('describe')->nullable();
            $table->string('device')->nullable();
            $table->string('OS')->nullable();
            $table->string('browser')->nullable();
            $table->string('version')->nullable();
            $table->longText('else')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
