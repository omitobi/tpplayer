<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;
class PlaylistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('playlists')->delete();
        \App\Playlist::create([
            'user_id' => 0,
            'name' => 'General',
            'type' => 'Public',
            'description' => 'The playlist for everybody'
        ]);
        Model::reguard();
        //
    }
}
