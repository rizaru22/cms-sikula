
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SummernoteController;
use App\Http\Controllers\AchievementController;



Route::prefix('admin')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('profile', ProfileController::class)->names('admin.profile');
    Route::resource('news', NewsController::class)->names('admin.news');
    Route::resource('achievement', AchievementController::class)->names('admin.achievement');
    Route::post('/summernote/upload', [SummernoteController::class, 'upload'])->name('admin.summernote.upload');
    Route::resource('carousel', \App\Http\Controllers\CarouselController::class)->names('admin.carousel');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/',\App\Livewire\Dashboard::class)->name('home');
Route::get('/berita/{slug}', \App\Livewire\Berita::class)->name('news.detail');
