<?php

namespace App\Http\Controllers\API;

use App\Music;
use App\Playlist;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlaylistsApiController extends Controller
{
    public function __construct(Playlist $playlists, User $users)
    {
        $this->playlists = $playlists;
        $this->users = $users;
    }

    public function addMusicToPlaylist($playlist_id, $music_id, Request $request)
    {
        if(!Auth::check())
        {
            return response()->json(
                [
                    'result' => 'errors',
                    'message' => 'Unauthorized to add to playlist'
                ],
                403
            );
        }

        if(!is_numeric($playlist_id) || !is_numeric($music_id))
        {
            return response()->json(
                [
                'error' => 'Invalid ids'
                ],
                400);
        }
        $requests['playlist_id'] = $playlist_id;
        $requests['music_id'] = $music_id;

        $user = Auth::user();

        if(!$playlist = $user->playlists()->find($requests['playlist_id']))
        {
            return response()->json([
                'result' => 'errors',
                'message' => 'You don\'t have this playlist'
            ], 422);

        }

        if(!$music = Music::find($music_id))
        {
            return response()->json([
                'result' => 'errors',
                'message' => 'Music does not exist'
            ], 400);
        }

        $musicsplaylists = $playlist->musicsplaylists();
        if($musicsplaylists->where('music_id', $music->id)->first())
        {
            return response()->json([
                'result' => 'success',
                'message' => "This music is already in your: '{$playlist->name}' playlist"
            ]);
        }

        if(!$musicsplaylists->create(['music_id' => $music->id]))
        {
            return response()->json([
                'result' => 'errors',
                'message' => 'Something went wrong add to playlist'
            ], 500);
        }
        return response()->json(
            [
                'result' => 'success',
                'message' => "Added '{$music->name}' to playlist '{$playlist->name}' successfully"
            ],
            201
        );
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

    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return response()->json(
                [
                    'result' => 'errors',
                    'message' => 'Unauthorized to create playlist'
                ],
                403
            );
        }
        $requests = $request->only(['name', 'type', 'description']);

        if($this->hasEmpty($requests))
        {
            return response()->json(
                [
                    'result' => 'errors',
                    'message' => 'One of the fields are invalid'
                ],
                400
            );
        }

        $user = Auth::user();
        if(!$playlist = $user->playlists()->create($requests))
        {
            return response()->json([
                'result' => 'errors',
                'message' => 'Something went while creating playlist'
            ], 500);
        }

        return response()->json([
            'result' => 'success',
            'message' => "Playlist '{$playlist->name}' created successfully"
        ], 200);
    }

    public function update($playlist_id, Request $request)
    {
        if(!Auth::check())
        {
            return response()->json(
                [
                    'result' => 'errors',
                    'message' => 'Unauthorized to update playlist'
                ],
                403
            );
        }
        $requests = $request->only(['name', 'type', 'description']);
        if($this->hasEmpty($requests))
        {
            return response()->json(
                [
                    'result' => 'errors',
                    'message' => 'One of the fields are invalid'
                ],
                400
            );
        }
        $user = Auth::user();

        if(!$playlist = $user->playlist($playlist_id)
            ->update($requests))
        {
            return response()->json([
                'result' => 'errors',
                'message' => 'Something went while updating playlist'
            ], 500);
        }


        return response()->json([
            'result' => 'success',
            'message' => "Playlist updated successfully"
        ], 200);
    }


    public function destroy($playlist_id )
    {
        if (!Auth::check()) {
            return response()->json(['result' => 'errors', 'message' => 'You cannot delete this playlist'], 403);
        }
        $user = Auth::user();
        if (!$playlist = $user->playlist($playlist_id)) {
            return response()->json(['result' => 'errors', 'message' => 'Playlist does not exist'], 404);
        }
        /*if(!$user->deletedmusics()->create(['music_id' => $music->id, 'link' => $music->link])) {
            return response()->json(['result' => 'errors', 'message' => 'Error backing music up when deleting'], 500);
        }*/
        if (!$playlist->delete()) {
            return response()->json(['result' => 'errors', 'message' => 'Error when deleting playlist'], 500);
        }
        return response()->json(
            ['result' => 'success', 'message' => "playlist deleted successfully"]
            , 200);
    }


    protected function hasEmpty($requests)
    {
        $requests = array_values($requests);
        if(in_array(null, $requests))
            return true;
        return false;
    }
}
