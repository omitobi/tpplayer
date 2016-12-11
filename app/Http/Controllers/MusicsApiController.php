<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;

use App\Http\Requests;

class MusicsApiController extends Controller
{
    //
    public function getAll(Music $music){
        $musics =  $music->all();
        return $musics;
    }
}
