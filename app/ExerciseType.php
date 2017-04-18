<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseType extends Model
{
    protected $fillable = ['name'];

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
