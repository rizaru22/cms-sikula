
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SummernoteController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AnnouncementController;



Route::prefix('admin')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('profile', ProfileController::class)->names('admin.profile');
    Route::resource('news', NewsController::class)->names('admin.news');
    Route::resource('achievement', AchievementController::class)->names('admin.achievement');
    Route::resource('product', ProductController::class)->names('admin.product');
    Route::resource('agenda', AgendaController::class)->names('admin.agenda');
    Route::resource('announcement', AnnouncementController::class)->names('admin.announcement');
    Route::resource('users', UsersController::class)->names('admin.users');
    Route::post('/summernote/upload', [SummernoteController::class, 'upload'])->name('admin.summernote.upload');
    Route::resource('carousel', \App\Http\Controllers\CarouselController::class)->names('admin.carousel');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/',\App\Livewire\Dashboard::class)->name('home');
Route::get('/berita/{slug}', \App\Livewire\Berita::class)->name('news.detail');
Route::get('/berita', \App\Livewire\DaftarBerita::class)->name('news.list');
Route::get('/prestasi', \App\Livewire\DaftarPrestasi::class)->name('achievement.list');
