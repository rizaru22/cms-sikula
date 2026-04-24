<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('currency', function ($expression) {
            return "<?php echo 'Rp ' . number_format($expression, 0, ',', '.'); ?>";
        });

        try {
            if (! Schema::hasTable('menus')) {
                View::share('menus', collect());

                return;
            }

            $menus = Cache::remember('menus', 3600, function () {
                return Menu::where('is_active', 1)
                    ->orderBy('order')
                    ->get();
            });

            View::share('menus', $menus);
        } catch (Throwable $e) {
            Log::warning('Skipping shared menus during boot: '.$e->getMessage());
            View::share('menus', collect());
        }
    }
}
