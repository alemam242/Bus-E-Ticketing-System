<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    function coach(){
        return $this->belongsTo(Coach::class);
    }

    function ticket(){
        return $this->hasMany(Ticket::class);
    }

    public function departureLocation()
    {
        return $this->belongsTo(Location::class,'departure_location_id');
    }

    public function arrivalLocation()
    {
        return $this->belongsTo(Location::class,'arrival_location_id');
    }

    function seatAllocation(){
        return $this->hasMany(SeatAllocation::class);
    }
}
