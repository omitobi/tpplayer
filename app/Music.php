<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    //
    protected $fillable = ['name', 'link', 'duration'];

    public function user(){
        $this->belongsTo(User::class);
    }
}
