<?php

namespace App\Http\Controllers;

use App\Music;
use App\MusicsPlaylist;
use App\Playlist;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Http\Requests;

class MISCUtilitiesController extends Controller
{
    //

    function loadPlaylist
    (
        Playlist $playlists_,
        User $users_,
        Music $musics_,
        MusicsPlaylist $musicsplaylists_
    )
    {
        $failed = [];
        $musics = $musics_->all();

        if(!$playlist = $playlists_->updateOrCreate(['id' => '1'],
            [
                'user_id' => 0,
                'name' => 'General',
                'type' => 'Public',
                'description' => 'The playlist for everybody'
            ]
        ))
        {
            return response()->json(['something failed at play_list_creation'], 500);
        }
        foreach ($musics as $music) {
//            Model::unguard(true);
            if($music->musicsplaylists()->save( new MusicsPlaylist(['playlist_id', $playlist->id])))
            {
                $failed['mpl'][] = false;
            } else { $failed['mpl'][] = true; }
        }
        if(in_array(true, $failed['mpl']))
        {
            return response()->json(['something failed at music_play_list_creation']);
        }

        return response()->json(
            [
                'message' => 'everything went well',
                'stat' => "{$music->count()} used"
            ], 201);

    }
}
