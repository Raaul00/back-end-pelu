<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'role',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
