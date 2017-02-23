<?php

namespace App\Http\Controllers\Dashboard;

use App\Playlist;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function show()
    {
        $user_id = Auth::user()->id;
        $playlists = Playlist::find(1);
        
        return view('dashboard.index', compact('playlists'));
    }
}
