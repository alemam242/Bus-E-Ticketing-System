<?php

namespace App\Models;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable=[
        'trip_id','user_id','number_of_ticket','total_fare'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function trip(){
        return $this->belongsTo(Trip::class);
    }
}
