<?php

namespace App\Http\Controllers\Playlist;

use App\Playlist;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlaylistsController extends Controller
{
    //
    public function __construct(Playlist $playlist)
    {
//        $this->playlists = $playlist;
    }

    public function show()
    {
       /* $user = Auth::user();
        $playlists = $user->musics()->with('playlists.musicplaylists');*/
        return redirect('/');

    }

    public function index()
    {
        if(!Auth::check())
        {
            return response()->json(
                [
                    'result' => 'errors',
                    'message' => 'Unauthorized to retrieve playlist'
                ],
                403
            );
        }

        $user = Auth::user();
        $playlists = $user->playlists;
        if(!$playlists->count())
        {
            return response()->json(
                [
                    'result' => 'errors',
                    'message' => 'You don\'t have any playlist'
                ],
                404
            );
        }

        return response()->json(
            [
                'result' => 'success',
                'param' => $playlists
            ],
            201
        );
    }
}
