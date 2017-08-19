<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MusicShare extends Model
{
    public function music()
    {
        return $this->belongsTo(Music::class);
    }
}
