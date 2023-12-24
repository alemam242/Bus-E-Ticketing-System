<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatAllocation extends Model
{
    use HasFactory;

    protected $fillable=['trip_id','coach_id','number_of_ticket','journey_date'];

    function trip(){
        return $this->belongsTo(Trip::class);
    }
    function coach(){
        return $this->belongsTo(Coach::class);
    }
}
