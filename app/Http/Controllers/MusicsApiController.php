<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;
use GuzzleHttp;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class MusicsApiController extends Controller
{
    //
    public function getAll(Music $music){
        $musics =  $music->all();
        return $musics;
    }

    public function getOne(Music $music){
        return $music;
    }

    public function isWorkingLink(){

        $link = Input::get('link');
////        $client = new GuzzleHttp\Client();
////        $res = $client->request('GET', $link, [
////        ]);
////        $url = "http://www.example.com/";
//
        $headers = get_headers($link);
//
        $code = $headers[0];

        return $code;
    }
}