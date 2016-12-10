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
        return $music->all();
    }

    public function addMusic(Music $music, Request $request)
    {
        if(Auth::guest())
        {
            $newMusic = $this->separateMusic($request);
            // do what you need to do
        } else{
            $newMusic = $this->separateMusic($request, false);
        }
        $music->save($newMusic);
        return back();
    }

    public function separateMusic($request, $public = true){
        //todo: validate if its an mp3
        $this->validate($request,
            [
                'link' => 'bail|required|unique:musics|min:18'
            ]
        );

        $url = $request->link;
        $requestNew['link'] = urldecode($url);
        $name =  pathinfo($url);
        $requestNew['name'] = urldecode( $name['filename'] );
        $requestNew['duration'] = '00:00';
        $requestNew['user_id'] = $public ? 0 : $request->user()->id;
        return $requestNew;
    }

}
