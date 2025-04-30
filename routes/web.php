<?php
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;

use App\Http\Controllers\StableController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HorseController;
use App\Http\Controllers\PathController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ThemeController;

use App\Models\User;
use App\Models\Booking;
use App\Models\Horse;

// use App\Http\Controllers\AdminController;
Route::controller(ThemeController::class)->group(function () {
    Route::get('/', 'index')->name('theme.index');
    Route::post('/about', 'about')->name('theme.about');
    Route::get('/contact', 'contact')->name('theme.contact');
    Route::get('/hotels', 'hotels')->name('theme.hotels');
    Route::get('/about',   'about')->name('theme.about');
 
});



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin', [AdminController::class, 'index']);

Route::resource('stables', StableController::class);
Route::resource('admins', AdminController::class);
Route::resource('users', UserController::class);
Route::resource('horses', HorseController::class);
Route::resource('horses', HorseController::class);
Route::resource('paths', PathController::class);
Route::resource('bookings', BookingController::class);
Route::resource('bookings', BookingController::class);


// Admin login routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'userCount' => \App\Models\User::count(),
            'bookingCount' => \App\Models\Booking::count(),
            'horseCount' => \App\Models\Horse::count(),
        ]);
    })->name('dashboard');
});

Route::get('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
Route::post('/admin/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
