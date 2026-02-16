<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;



class SitemapController extends Controller
{
    //
    public function index()
    {
        return response()
            ->view('sitemap.index')
            ->header('Content-Type', 'text/xml');
    }

    public function news()
    {
        $xml=Cache::remember('sitemap-news',3600,function(){
            $items=\App\Models\News::select('slug','updated_at')->latest()->get();
            $baseUrl=url('/news');
            return view('sitemap.partials.urlset',compact('items','baseUrl'))->render();

            
        });
        return Response::make($xml,200,['Content-Type'=>'text/xml']);
    }

    public function prestasi()
    {
        $xml=Cache::remember('sitemap-prestasi',3600,function(){
            $items=\App\Models\Achievement::select('slug','updated_at')->latest()->get();
            $baseUrl=url('/achievement');
            return view('sitemap.partials.urlset',compact('items','baseUrl'))->render();

            
        });
        return Response::make($xml,200,['Content-Type'=>'text/xml']);
    }

    public function produk()
    {
        $xml=Cache::remember('sitemap-produk',3600,function(){
            $items=\App\Models\Produk::select('slug','updated_at')->latest()->get();
            $baseUrl=url('/produk');
            return view('sitemap.partials.urlset',compact('items','baseUrl'))->render();

            
        });
        return Response::make($xml,200,['Content-Type'=>'text/xml']);
    }

    public function kompetensi()
    {
        $xml=Cache::remember('sitemap-kompetensi',3600,function(){
            $items=\App\Models\KompetensiKeahlian::select('slug','updated_at')->latest()->get();
            $baseUrl=url('/kompetensi-keahlian');
            return view('sitemap.partials.urlset',compact('items','baseUrl'))->render();

            
        });
        return Response::make($xml,200,['Content-Type'=>'text/xml']);
    }
    
}
