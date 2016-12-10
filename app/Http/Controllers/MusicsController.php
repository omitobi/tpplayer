<?php

namespace App\Http\Controllers;

use App\Music;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use App\Http\Requests;

class MusicsController extends Controller
{
    //
    public function index(){

    }
    public function getAllMusic(Music $music){
        $musics =  $music->all();
        return view('welcome', compact($musics));
    }

    public function addMusic(User $user, Request $request)
    {
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
        //todo: validate if its an mp3
        $this->validate($request,
            [
                'link' => 'bail|required|unique:musics|min:18'
            ]
        );
        $requestNew = $request;
        $requestNew['link'] = urldecode($request->link);
        $name =  pathinfo($request->link);
        $requestNew['name'] = urldecode( $name['filename'] );
        $requestNew['duration'] = '00:00';
        $requestNew['user_id'] = $public ? 0 : $request->user()->id;
        return $requestNew;
    }

}
