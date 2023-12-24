<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    function showTickets($id){

        $user = User::findOrFail($id);


        $tickets = $user->ticket()->with(['trip.departureLocation', 'trip.arrivalLocation'])->get();


    // return $tickets;

        return view('admin.pages.tickets',compact('tickets'));
    }
}
