<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;



Route::get('/', function () {
    return redirect()->route('user.login');
});


  Route::middleware('auth.admin')->prefix('user')->group(function () {
    Route::get('/dashboard',[UserController::class, 'showDashboard'])->name('user.dashboard');
    Route::post('/trip',[UserController::class, 'showTrips'])->name('user.trip');
    Route::post('/trip/buy',[UserController::class, 'buyTicket'])->name('user.buyTicket');
    Route::get('/ticket/{id}',[TicketController::class, 'showTickets'])->name('user.ticket');
  });

Route::post('/logout',[UserController::class, 'destroy'])->name('logout');

Route::group(['prefix'=>'user'], function () {
    Route::get('/login',[UserController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login',[UserController::class, 'authUser'])->name('user.login');

    Route::get('/signup',[UserController::class, 'showSignupForm'])->name('user.signup');
    Route::post('/signup',[UserController::class, 'addUser'])->name('user.signup');
});