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
| routes are loaded by the RouteServiceProvider within a group which]
| contains the "web" middleware group. Now create something great!
|
*/

// Menampilkan Halaman Homepage
Route::get('/', function () {
    return view('homepage');
});

// Menampilkan Halaman Income
Route::get('/income', function () {
    return view('income');
});

// Login Admin
Route::get('/login', [LoginController::class, 'index'])->name('login'); // saat admin mengakses URL '/login', Laravel akan memanggil method 'index' dalam LoginController untuk menangani permintaan tersebut.
Route::post('/login', [LoginController::class, 'authenticate']); // saat admin mengirimkan data melalui formulir login dengan metode POST ke URL '/login', Laravel akan memanggil method 'authenticate' dalam LoginController untuk memproses dan memvalidasi data login tersebut.
Route::post('/logout', [LoginController::class, 'logout']); //  saat admin melakukan permintaan logout dengan metode POST ke URL '/logout', Laravel akan memanggil method 'logout' dalam LoginController untuk menjalankan logika yang terkait dengan proses logout.

//booking
Route::get('/booking', [BookingController::class, 'index']); // saat user mengakses URL '/booking', Laravel akan memanggil method 'index' dalam BookingController untuk menampilkan halaman atau melakukan operasi lain yang terkait dengan fitur booking.
Route::post('/booking', [BookingController::class, 'store']); // saat user mengirimkan data melalui permintaan POST ke URL '/booking', Laravel akan memanggil method 'store' dalam BookingController untuk memproses dan menyimpan data booking yang dikirimkan.

//admin
Route::get('/reservation', [BookingController::class, 'reservation'])->middleware('auth'); // saat admin mengakses URL '/reservation', Laravel akan memeriksa apakah pengguna telah terotentikasi. Jika pengguna belum terotentikasi, Laravel akan mengarahkan pengguna ke halaman login. Jika pengguna telah terotentikasi, Laravel akan memanggil method 'reservation' dalam BookingController untuk menampilkan halaman reservasi atau melakukan operasi lain yang terkait dengan fitur reservasi.
Route::get('/dashboard', [BookingController::class, 'dashboard'])->middleware('auth'); // saat admin mengakses URL '/dashboard', Laravel akan memeriksa apakah pengguna telah terotentikasi. Jika pengguna belum terotentikasi, Laravel akan mengarahkan pengguna ke halaman login. Jika pengguna telah terotentikasi, Laravel akan memanggil method 'dashboard' dalam BookingController untuk menampilkan halaman dashboard atau melakukan operasi lain yang terkait dengan fitur dashboard.
Route::delete('/deleteBooking/{booking:id}', [BookingController::class, 'destroy'])->middleware('auth'); // saat admin melakukan permintaan DELETE ke URL '/deleteBooking/{booking:id}', Laravel akan memeriksa apakah pengguna telah terotentikasi. Jika pengguna belum terotentikasi, Laravel akan mengarahkan pengguna ke halaman login. Jika pengguna telah terotentikasi, Laravel akan memanggil method 'destroy' dalam BookingController untuk menangani logika penghapusan data booking sesuai dengan id yang diberikan.
Route::put('/reservation/{booking:id}', [BookingController::class, 'sudah_bayar'])->middleware('auth'); // saat admin melakukan permintaan PUT ke URL '/reservation/{booking:id}', Laravel akan memeriksa apakah pengguna telah terotentikasi. Jika pengguna belum terotentikasi, Laravel akan mengarahkan pengguna ke halaman login. Jika pengguna telah terotentikasi, Laravel akan memanggil method 'sudah_bayar' dalam BookingController untuk menangani logika yang terkait dengan penandaan bahwa booking tersebut sudah dibayar.
Route::get('/income', [BookingController::class, 'income'])->middleware('auth'); //  saat admin mengakses URL '/income', Laravel akan memeriksa apakah pengguna telah terotentikasi. Jika pengguna belum terotentikasi, Laravel akan mengarahkan pengguna ke halaman login. Jika pengguna telah terotentikasi, Laravel akan memanggil method 'income' dalam BookingController untuk menampilkan informasi tentang pendapatan (income) yang terkait dengan aplikasi
Route::get('/reservation/cetak_reservation', [BookingController::class, 'reservation_pdf']); // saat admin mengakses URL '/reservation/cetak_reservation', Laravel akan memanggil method 'reservation_pdf' dalam BookingController untuk menangani permintaan tersebut.
Route::get('/income/cetak_income', [BookingController::class, 'income_pdf']); // saat admin mengakses URL '/income/cetak_income', Laravel akan memanggil method 'income_pdf' dalam BookingController untuk menangani permintaan tersebut.
