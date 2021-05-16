<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->id('college_id');
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('Ename')->nullable();
            $table->text('about')->nullable();
            $table->string('image')->nullable()->default('defaultMajor.png');
            $table->string('cover')->nullable()->default('defultBack.jpg');

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
        Schema::dropIfExists('colleges');
    }
}
