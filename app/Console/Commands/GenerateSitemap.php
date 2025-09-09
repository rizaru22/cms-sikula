<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
    protected $description = 'Generate sitemap.xml from database entries';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $profiles = DB::table('profiles')->orderBy('updated_at', 'desc')->get();
        $news  = DB::table('news')->orderBy('updated_at', 'desc')->get();
        $achievements  = DB::table('achievements')->orderBy('updated_at', 'desc')->get();
        $kompetensi_keahlians = DB::table('kompetensi_keahlians')->orderBy('updated_at', 'desc')->get();
        $produks = DB::table('produks')->orderBy('updated_at', 'desc')->get();
        $agendas = DB::table('agendas')->orderBy('updated_at', 'desc')->get();
        $pengumumans = DB::table('pengumumans')->orderBy('updated_at', 'desc')->get();

        $xml = view('sitemap', compact('profiles', 'news','achievements','kompetensi_keahlians','produks','agendas','pengumumans'))->render();

        file_put_contents(public_path('sitemap.xml'), $xml);

        $this->info('✅ Sitemap berhasil diperbarui!');

    }
}
