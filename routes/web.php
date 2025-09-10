
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AchievementController;

// Route::get('/', function () {
//     return view('layouts.app', [
//         'title' => 'Home',
//         'menu'=>'dashboard'
//     ]);
// })->name('ad');

Route::prefix('admin')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('profile', ProfileController::class)->names('admin.profile');
    Route::resource('news', NewsController::class)->names('admin.news');
    Route::resource('achievement', AchievementController::class)->names('admin.achievement');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
