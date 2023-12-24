<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Trip;
use App\Models\User;
use App\Models\Coach;
use App\Models\Ticket;
use App\Models\Location;
use App\Models\SeatAllocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    
    function showLoginForm(){
        // Session::forget('admin');
        if(Session::has('admin')){
            return redirect()->back();
        }
        return view('user.pages.login');
    }

    function showSignupForm(){
        if(Session::has('admin')){
            return redirect()->back();
        }
        return view('user.pages.signup');
    }

    function addUser(Request $request){
        $this->validate($request, [
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required|string',
        ]);

        // dd($request);
        // $request->input('password') = Hash::make($request->input('password'));

        // $result = User::create($request->input());
        $result = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')),
        ]);

        if(!$result){

            return redirect()->back()->with('failed','Registration failed.');
        }
        return redirect()->back()->with('success', 'Registration Successful.');
    }

    function authUser(Request $request){
        //validate requests
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // $currentRouteName = request()->route()->getName();

        $data = User::whereEmail($request->input('email'))->first();
        
        if($data){
            if (Hash::check($request->input('password'), $data->password)) {
                $userInfo = [
                    'id'=>$data->id,
                    'username'=>$data->username,
                    'email'=>$data->email,
                    'phone'=>$data->phone,
                    'role'=>'user'
                ];

                Session::put('admin', $userInfo);
                return redirect()->route('user.dashboard');
            }
        }

        return redirect()->back()->with('failed', "Login failed!");

    }


    function showDashboard(){

        $cities = Location::all();

                // return $cities;

        return view('user.pages.home',compact('cities'));
    }

    function showTrips(Request $request){
        $trips = Trip::with('coach', 'departureLocation', 'arrivalLocation')
        ->whereDepartureLocationId($request->input('from'))
        ->whereArrivalLocationId($request->input('to'))
        ->whereDate('departure_time',$request->input('date'))
        ->get();

        foreach($trips as $trip){
            $result = SeatAllocation::where('trip_id',$trip->id)
            ->where('coach_id',$trip->coach->id)
            ->whereDate('journey_date',$request->input('date'))
            ->sum('number_of_ticket');

            $trip->availableTickets = $trip->coach->available_sit - $result;
        }

        // return $trips;



        return view('user.pages.trips',compact('trips'));
    }

    function buyTicket(Request $request){
        $result = Trip::with('coach')
        ->whereId($request->input('trip_id'))
        ->whereCoachId($request->input('coach_id'))
        ->get();

        $data = [
            'trip_id' => $request->input('trip_id'),
            'coach_id' => $request->input('coach_id'),
            'number_of_ticket' => $request->input('quantity'),
            'journey_date' => $request->input('journeyDate'),
        ];
        // return $data;
        $allocation = SeatAllocation::create($data);

        $ticket = Ticket::create(
            [
                'trip_id' => $request->input('trip_id'),
                'user_id' => Session::get('admin')['id'],
                'number_of_ticket' => $request->input('quantity'),
                'total_fare' => $result[0]->fare * $request->input('quantity'),
            ]
        );
        if(!$ticket){
            return redirect()->back()->with('failed', 'Purchase ticket failed.');
        }
        return redirect(route('user.ticket',Session::get('admin')['id']))->with('success', 'Purchase ticket successfully.');
    }


    function destroy(){
        $user = Session::get('admin');
        if($user){
            Session::forget('admin');
        }
        return redirect()->route('user.login');
    }
}
