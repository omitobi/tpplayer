<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_shares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('music_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('share_id')->unique(); //unique id to mark a share
            $table->dateTime('expiry');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('music_shares');
    }
}
