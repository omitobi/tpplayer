<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function musicsplaylists()
    {
        return $this->hasMany(MusicsPlaylist::class);
    }
}
