<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupsUserChats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grup_user_chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('grub_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->text('chat');
            $table->timestamps();
        });

        Schema::table('grup_user_chats', function($table) {
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('grup_user_chats', function($table) {
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
        Schema::dropIfExists('grup_user_chats');
    }
}
