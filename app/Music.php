<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    //
    protected $fillable = ['user_id', 'name', 'link', 'duration'];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function musicsplaylists()
    {
        return $this->hasMany(MusicsPlaylist::class);
    }

    public function isPublic(){
        return !$this->user_id ? $this : false;
    }

    public function isOwner($user_id){
        return ($this->user_id  === $user_id) ? $this : false;
    }
}
