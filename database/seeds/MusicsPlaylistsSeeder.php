<?php

use App\Music;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MusicsPlaylistsSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        Model::unguard();
        DB::table('musics_playlists')->delete();
        $musics = Music::all();
        $playlist = \App\Playlist::find(1);
        foreach ($musics as $music)
        {
            $playlist->musicsplaylists()->create(['music_id' => $music->id]);
        }
        Model::reguard();
        //
    }
}
