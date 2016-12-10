<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    //

    public function user(){
        $this->belongsTo(User::class);
    }
}
