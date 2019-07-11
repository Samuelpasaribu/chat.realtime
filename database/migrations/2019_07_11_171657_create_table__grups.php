<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGrups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_grup', 150);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('grups', function($table) {
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grups');
    }
}
