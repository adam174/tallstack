<?php

use App\Http\Controllers\TripController;
use App\Http\Controllers\Voyager\VoyagerTripController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Voyager\VoyagerCategoryController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
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

Route::get('/', [TripController::class, 'index'])->name('home');
//Route::view('/tours', 'tours.index')->name('tours');
Route::get('/discovery/', [TripController::class, 'discovery'])->name('discovery');
Route::get('/hajj-omra/', [TripController::class, 'omra'])->name('omra');
Route::get('/tours/list/{id}/{slug?}', [TripController::class, 'list'])->name('list');
Route::get('/tours/details/{id}/{slug?}', [TripController::class, 'show'])->name('tours.details');
//Route::view('/tours/list', 'tours.list')->name('list');
Route::view('/tours/list/1', 'tours.details')->name('details');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});


Route::group(['prefix' => 'admin'], function () {
    Route::delete('/trip/photos/{id}', [VoyagerTripController::class,'destroyPhoto'])->name('destroyPhoto');
    Route::post('/trip/photos/{id}', [VoyagerTripController::class,'storePhoto'])->name('storePhoto');
    Route::put('/trip/services/{id}', [VoyagerTripController::class,'tripServices'])->name('trip.services');
    Route::patch('/category/photo/{id}', [VoyagerCategoryController::class,'categoryUpdatePhoto'])->name('category.update');
    Voyager::routes();
});


Route::post('/reserve/{id}', [ReservationController::class,'store'])->name('reservation.store');
