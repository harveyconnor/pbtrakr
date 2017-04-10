<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Google extends Model
{

    protected $fillable = [
        'google_id', 'avatar', 'name', 'nickname', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
