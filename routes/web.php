<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
    });
    
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store');
    });
});

Route::group(['prefix' => '/admin', 'as' => 'admin.', "middleware" => ['auth', 'verified']], function(){
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('/users', UserController::class)->names('users');

    Route::group(['prefix' => '/auth', 'as' => 'auth.'], function(){
        // Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
        // Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
        // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
        Route::post('logout', LogoutController::class)->name('logout');
        
        Route::controller(ConfirmablePasswordController::class)->group(function () {
            Route::get('/confirm-password', 'show')->name('password.confirm');
            Route::post('/confirm-password', 'store');
        });
    });
});

 
// Route::controller(UserController::class)->group(function () {
//     Route::get('/users/{id}', 'show');
//     Route::post('/users', 'store');
// });



// Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::post('login', [AuthenticatedSessionController::class, 'store']);

// require __DIR__.'/auth.php';
