<?php

namespace App\Http\Controllers\Music;

use App\Music;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MusicController extends Controller
{

    public function share($music_id)
    {
        Music::findOrFail($music_id);
        $time = Carbon::now()->addHour()->toDateTimeString();
        $identifier = encrypt($music_id.'_to_'.$time);

        $share_url = route('music.shared', $identifier);
        return $share_url;
    }

    public function playShared($identifier)
    {
        try{
            $id_str = decrypt($identifier.'1lksdnsakjhdsjk');
            $ids    =  explode('_to_', $id_str);
            $stamp  = Carbon::parse($ids[1])->lessThan(Carbon::now());
            if($stamp) {
                return redirect('/');
            }
            $music = Music::findOrFail($ids[0]);
            return view('shares.music', compact('music'));
        } catch (DecryptException $exception) {
            return redirect('/');
        }
    }
}
