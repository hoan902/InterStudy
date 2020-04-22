<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guarded = [];

    public function Accounts()
    {
        return $this->belongsTo(User::class);
    }
}
