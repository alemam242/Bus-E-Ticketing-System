<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    public function departingTrips()
    {
        return $this->hasMany(Trip::class,'departure_location_id');
    }

    public function arrivingTrips()
    {
        return $this->hasMany(Trip::class,'arrival_location_id');
    }
}
