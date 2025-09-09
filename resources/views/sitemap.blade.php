<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <!-- Halaman statis -->
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ url('/profil-sekolah') }}</loc>
        <priority>0.8</priority>
    </url>

    <!-- Produk Sekolah -->
    @foreach($produks as $produk)
    <url>
        <loc>{{ url('/produk/'.$produk->slug) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($produk->updated_at)->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    <!-- Berita Sekolah -->
    @foreach($news as $berita)
    <url>
        <loc>{{ url('/berita/'.$berita->slug) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($berita->updated_at)->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach

     <!-- Prestasi Sekolah -->
    @foreach($achievements as $achievement)
    <url>
        <loc>{{ url('/prestasi/'.$achievement->slug) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($achievement->updated_at)->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
     <!-- Kompetensi Keahlian -->
    @foreach($kompetensi_keahlians as $kompetensi_keahlian)
    <url>
        <loc>{{ url('/kompetensi_keahlians/'.$kompetensi_keahlians->slug) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($kompetensi_keahlians->updated_at)->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
     <!-- Agenda -->
    @foreach($agendas as $agenda)
    <url>
        <loc>{{ url('/agenda/'.$agenda->title) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($agenda->updated_at)->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
     <!-- Agenda -->
    @foreach($pengumumans as $pengumuman)
    <url>
        <loc>{{ url('/pengumuman/'.$pengumuman->title) }}</loc>
        <lastmod>{{ \Carbon\Carbon::parse($pengumuman->updated_at)->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach

</urlset>
