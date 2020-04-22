<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guarded = [];

    // Specified the table below because the staff table is not in plural
    // In case of Laravel looking for the plural table
    protected $table = 'staff';

    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
