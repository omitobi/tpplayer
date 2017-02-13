<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name')->unique()->default('general');
            $table->string('type');
            $table->string('description');
            $table->string('playing_music_id')->unsigned()->default(0);//0 stays for public, 0 if last_played settings = 0
            $table->timestamps();
            $table->unique(['user_id', 'name'], 'user_name_unique');
//            $table->foreign('user_id')
//                ->references('id')->on('users')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('playlists');
    }
}
