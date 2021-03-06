<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicsPlaylist extends Model
{
    //'music_id', 'playlist_id',
    protected $fillable = [ 'music_id'];

    public function music()
    {
        return $this->belongsTo(Music::class);
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
