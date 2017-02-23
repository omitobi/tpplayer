<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        $playlists = $user->musics;
        return response()->json($playlists);

    }
}
