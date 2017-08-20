<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function musics(){
        return $this->hasMany(Music::class);
    }

    public function deletedmusics()
    {
        return $this->hasMany(DeletedMusic::class, 'deleter_id');
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    public function musicShares()
    {
        return $this->hasMany(MusicShare::class);
    }

    public function scopePlaylist($query, $playlist_id)
    {
        return $this->playlists()->find($playlist_id);
    }
}
