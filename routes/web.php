<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TicketController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::resource('hotel',HotelController::class);

Route::resource('customer',CustomerController::class);

Route::resource('room',RoomController::class);

Route::resource('event',EventController::class);

Route::resource('activity',ActivityController::class);

Route::get('booking',[BookingController::class,'index']);
Route::post('booking/',[BookingController::class,'validateCustomer']);
Route::get('/booking/event/{eventid}/bookroom/',[BookingController::class,'viewRooms']);
Route::get('/booking/rooms/{roomid}/pay/',[BookingController::class,'pay']);
Route::post('/booking/mybookings/',[BookingController::class,'updateBookingRoom']);
Route::get('/booking/rooms/pay/mybookings/',[BookingController::class,'viewMyBookings']);
Route::get('/booking/rooms/pay/mybookings/',[BookingController::class,'viewMyBookings']);
Route::get('/viewbookings',[BookingController::class,'viewBookings']);
Route::post('/viewbookings',[BookingController::class,'viewBookingCheck']);

Route::get('/ticketing',[TicketController::class,'chooseEvent']);
Route::get('/mytickets',[TicketController::class,'viewMyTickets']);
Route::get('/ticketing/event/{id}',[TicketController::class,'getTicket']);
Route::post('/ticketing/pay',[TicketController::class,'enterTicket']);

