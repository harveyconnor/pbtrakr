<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = ['name','description'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
