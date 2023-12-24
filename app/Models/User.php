<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username','email','phone','password'
    ];


    function ticket(){
        return $this->hasMany(Ticket::class);
    }
}
