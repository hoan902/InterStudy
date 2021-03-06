<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Classroom()
    {
        return $this->hasOne(Classroom::class);
    }
}
