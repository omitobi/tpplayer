<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicsPlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musics_playlists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('music_id')->unsigned();
            $table->integer('playlist_id')->unsigned()->nullable(false)->default(1);
            $table->timestamps();
            $table->unique(['music_id', 'playlist_id'], 'music_playlist_unique');
            $table->foreign('music_id')
                ->references('id')->on('musics')
                ->onDelete('cascade');
            $table->foreign('playlist_id')
                ->references('id')->on('playlists')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('musics_playlists');
    }
}
