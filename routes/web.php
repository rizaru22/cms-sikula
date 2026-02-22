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
    Route::resource('category-achievement', \App\Http\Controllers\CategoryAchievementController::class)->names('admin.category-achievement')->except(['show']);
    Route::resource('kompetensi', \App\Http\Controllers\KompetensiController::class)->names('admin.kompetensi');
    Route::resource('link', \App\Http\Controllers\LinkController::class)->names('admin.link')->except(['show']);
    Route::patch('link/{id}/toggle', [\App\Http\Controllers\LinkController::class, 'toggle'])->name('admin.link.toggle');
    Route::resource('announcement', \App\Http\Controllers\AnnouncementController::class)->names('admin.announcement')->except(['show']);
    Route::resource('ppdb', \App\Http\Controllers\PpdbController::class)->names('admin.ppdb');
    Route::patch('ppdb/{id}/toggle-status', [\App\Http\Controllers\PpdbController::class, 'toggleStatus'])->name('admin.ppdb.toggleStatus');
    Route::patch('ppdb/{id}/toggle-active', [\App\Http\Controllers\PpdbController::class, 'activate'])->name('admin.ppdb.toggleActive');

});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/',\App\Livewire\Dashboard::class)->name('home');
Route::get('/berita/{slug}', \App\Livewire\Berita::class)->name('news.detail');
Route::get('/berita', \App\Livewire\DaftarBerita::class)->name('news.list');
Route::get('/prestasi', \App\Livewire\DaftarPrestasi::class)->name('achievement.list');
Route::get('/produk/{slug}',\App\Livewire\Produk::class)->name('product.detail');
Route::get('/profil-sekolah', \App\Livewire\Profile::class)->name('profile.school');
Route::get('/kompetensi-keahlian/{slug}', \App\Livewire\KompetensiKeahlian::class)->name('kompetensi.detail');
Route::get('/prestasi/{slug}', \App\Livewire\Prestasi::class)->name('achievement.detail');
Route::get('/produk', \App\Livewire\DaftarProduk::class)->name('product.list');
Route::get('/info-ppdb', \App\Livewire\Ppdb::class)->name('ppdb.info');

// Route::get('/galeri', \App\Livewire\DaftarGaleri::class)->name('gallery.list');



// sitemap
Route::get('sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');
Route::get('sitemap-news.xml', [\App\Http\Controllers\SitemapController::class, 'news'])->name('sitemap.news');
Route::get('sitemap-prestasi.xml', [\App\Http\Controllers\SitemapController::class, 'prestasi'])->name('sitemap.prestasi');
Route::get('sitemap-produk.xml', [\App\Http\Controllers\SitemapController::class, 'produk'])->name('sitemap.produk');
Route::get('sitemap-kompetensi.xml', [\App\Http\Controllers\SitemapController::class, 'kompetensi'])->name('sitemap.kompetensi');