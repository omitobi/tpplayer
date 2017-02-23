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
        $this->playlists = $playlist;
    }

    public function show()
    {
        $user = Auth::user();
        $playlists = $user->musics()->with('playlists.musicplaylists');
        return $playlists;

    }
}
