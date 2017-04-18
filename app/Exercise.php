<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name','description','type_id','event_id','user_id'];

    public function type()
    {
        return $this->belongsTo(ExerciseType::class, 'type_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
