<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function clientHistories()
    {
        return $this->hasMany(ClientHistory::class);
    }
}
