<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaylistSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('playlist_id')->unsigned()->unique();
            $table->enum('repeat_all',[0, 1])->default(0);
            $table->smallInteger('repeat_music_id')->unsigned();
            $table->enum('random',[0, 1])->default(0);
            $table->timestamps();
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
        Schema::drop('playlist_settings');
    }
}
