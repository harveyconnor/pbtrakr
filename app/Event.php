<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name','description','discipline_id'];

    public function discipline()
    {
        return $this->belongsTo(Discipline::class, 'discipline_id');
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
