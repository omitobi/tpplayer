<?php
/**
 * Created by PhpStorm.
 * User: omitobisam
 * Date: 18/08/2017
 * Time: 02:22
 */

namespace App\Util;


use App\Music;
use Carbon\Carbon;

class Util
{
    public static function makeShareLink($music_id)
    {
        Music::findOrFail($music_id);
        $time = Carbon::now()->addHour()->toDateTimeString();
        $identifier = encrypt($music_id.'_to_'.$time);

        $share_url = route('music.shared', $identifier);

        return $share_url;
    }
}