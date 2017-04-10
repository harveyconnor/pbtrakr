<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGooglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('googles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('google_id');
            $table->string('name')->nullable();
            $table->string('avatar');
            $table->string('nickname')->nullable();
            $table->timestamps();
        });

        Schema::table('googles', function (Blueprint $table) {
            $table->foreign('user_id')->references('identifier_key')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('googles');
    }
}
