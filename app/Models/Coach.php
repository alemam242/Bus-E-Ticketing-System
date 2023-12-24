<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coach extends Model
{
    use HasFactory;

    function trip(){
        return $this->hasMany(Trip::class);
    }

    function seatAllocation(){
        return $this->hasMany(SeatAllocation::class);
    }
}
