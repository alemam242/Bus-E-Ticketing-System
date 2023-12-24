<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;



Route::get('/', function () {
    return redirect()->route('admin.login');
});


  Route::middleware('auth.admin')->prefix('user')->group(function () {
    Route::get('/dashboard',[UserController::class, 'showDashboard'])->name('admin.dashboard');
    Route::post('/trip',[UserController::class, 'showTrips'])->name('admin.trip');
    Route::post('/trip/buy',[UserController::class, 'buyTicket'])->name('admin.buyTicket');
    Route::get('/ticket/{id}',[TicketController::class, 'showTickets'])->name('admin.ticket');
  });

Route::post('/logout',[UserController::class, 'destroy'])->name('logout');

Route::group(['prefix'=>'user'], function () {
    Route::get('/login',[UserController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login',[UserController::class, 'authUser'])->name('admin.login');

    Route::get('/signup',[UserController::class, 'showSignupForm'])->name('admin.signup');
    Route::post('/signup',[UserController::class, 'addUser'])->name('admin.signup');
});