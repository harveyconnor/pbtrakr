<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['result','notes','date','exercise_id','user_id'];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
