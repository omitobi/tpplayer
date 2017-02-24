<?php

namespace App\Http\Controllers;

use App\Music;
use App\Playlist;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use App\Http\Requests;

class MusicsController extends Controller
{
    //
    public function getAllMusic(Request $request){

        if(!$request->has('playlist') || !$request->get('playlist'))
        {
            $request['playlist'] = 1;
        }
        $playlist = Playlist::where('user_id', '0')->first();
        if(!Auth::check())
        {
            $musics = $playlist->musicsplaylists()->with('music')
                ->get()->where('music.user_id', '0')->all();
            $musics['playlist_name'] = $playlist->name();
            return view('musics.index', ['musics' => $musics]);
        }
        if(Auth::check()) {
            $playlists = Auth::user()->playlists()->where('id', $request['playlist']);
            if($playlists->first())
            {
                $musics = $playlists->musicsplaylists()->with('music')->get();
            } else
            {
                $musics = $playlist->musicsplaylists()->with('music')
                    ->get();
                $musics->playlist_name = $playlist->name;
            }
//            $musics =  Music::all();
            return view('musics.index', ['musics' => $musics]);
        }
    }
    
    public function editOne(Music $music){
        if(Auth::guest())
        {
            return redirect('/');
        }
        return view('musics.edit', ['music' => $music]);
    }

    public function addMusic(User $user, Request $request)
    {
        //todo: validate if its an mp3
        $this->validate($request,
            [
                'link' => 'bail|required|unique:musics|min:18'
            ]
        );
        
        if(Auth::guest())
        {
            $newMusic = $this->separateMusic($request);
            $music = new Music($newMusic->all());
            $music->save();
            // do what you need to do
        } else{
            $newMusic = $this->separateMusic($request, false);
            $music = new Music($newMusic->all());
            $music->save();
        }
//        return $newMusic->all();


        return back();
    }
    
    

    public function separateMusic($request, $public = true){

        $requestNew = $request;
        $requestNew['link'] = urldecode($request->link);
        $name =  pathinfo($request->link);
        $requestNew['name'] = urldecode( $name['filename'] );
        $requestNew['duration'] = '00:00';
        $requestNew['user_id'] = $public ? 0 : $request->user()->id;
        return $requestNew;
    }

}
