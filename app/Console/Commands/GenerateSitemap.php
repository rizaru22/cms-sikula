<?php

namespace App\Console\Commands;

use App\Models\Achievement;
use App\Models\KompetensiKeahlian;
use App\Models\News;
use App\Models\Produk;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Warm sitemap cache using the current sitemap views';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Cache::put('sitemap-news', $this->renderUrlset(
            News::select('slug', 'updated_at')->latest('updated_at')->get(),
            url('/berita')
        ), 3600);

        Cache::put('sitemap-prestasi', $this->renderUrlset(
            Achievement::select('slug', 'updated_at')->latest('updated_at')->get(),
            url('/prestasi')
        ), 3600);

        Cache::put('sitemap-produk', $this->renderUrlset(
            Produk::select('slug', 'updated_at')->latest('updated_at')->get(),
            url('/produk')
        ), 3600);

        Cache::put('sitemap-kompetensi', $this->renderUrlset(
            KompetensiKeahlian::select('slug', 'updated_at')->latest('updated_at')->get(),
            url('/kompetensi-keahlian')
        ), 3600);

        $this->info('Sitemap cache berhasil diperbarui.');

        return self::SUCCESS;
    }

    protected function renderUrlset($items, string $baseUrl): string
    {
        return view('sitemap.partials.urlset', compact('items', 'baseUrl'))->render();
    }
}
