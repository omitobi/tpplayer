<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Music;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @param Music $music
     * @return \Illuminate\Http\Response
     */
    public function index(Music $music)
    {
        $musics = $music->all();
        return view('home', compact('musics'));
    }
}
