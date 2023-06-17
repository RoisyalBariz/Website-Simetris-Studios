<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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
    return view('homepage');
});

// Route::get('/booking', function () {
//     return view('booking');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

// Route::get('/reservation', function () {
//     return view('reservation');
// });

Route::get('/income', function () {
    return view('income');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//booking
Route::get('/booking', [BookingController::class, 'index']);
Route::post('/booking', [BookingController::class, 'store']);

//admin
Route::get('/reservation', [BookingController::class, 'reservation'])->middleware('auth');
Route::get('/dashboard', [BookingController::class, 'dashboard'])->middleware('auth');
Route::delete('/deleteBooking/{booking:id}', [BookingController::class, 'destroy'])->middleware('auth');
Route::put('/reservation/{booking:id}', [BookingController::class, 'sudah_bayar'])->middleware('auth');
Route::get('/income', [BookingController::class, 'income'])->middleware('auth');
Route::get('/reservation/cetak_reservation', [BookingController::class, 'reservation_pdf']);
Route::get('/income/cetak_income', [BookingController::class, 'income_pdf']);
