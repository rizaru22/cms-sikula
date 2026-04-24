<?php

namespace App\Providers;

use App\Models\Link;
use App\Models\Profile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Throwable;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                $profile = Schema::hasTable('profiles') ? Profile::first() : null;
                $links = Schema::hasTable('links') ? Link::all() : collect();

                $view->with('profile', $profile);
                $view->with('links', $links);
            } catch (Throwable $e) {
                Log::warning('Skipping shared profile/links: '.$e->getMessage());
                $view->with('profile', null);
                $view->with('links', collect());
            }
        });
    }
}
