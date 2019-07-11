<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGrupsUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grup_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('grub_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('grup_users', function($table) {
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onUpdate('cascade');
        });

        Schema::table('grup_users', function($table) {
            $table->foreign('grub_id')
            ->references('id')->on('grups')
            ->onDelete('cascade')
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
        Schema::dropIfExists('grup_users');
    }
}
