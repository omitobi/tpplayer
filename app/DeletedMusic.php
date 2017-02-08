<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedMusic extends Model
{
    //
    protected $fillable = [
        'music_id', 'link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'deleter_id');
    }
}
