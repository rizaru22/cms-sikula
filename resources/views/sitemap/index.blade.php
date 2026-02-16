{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <sitemap>
        <loc>{{ url('/sitemap-news.xml') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </sitemap>

    <sitemap>
        <loc>{{ url('/sitemap-kompetensi.xml') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </sitemap>

    <sitemap>
        <loc>{{ url('/sitemap-produk.xml') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </sitemap>

    <sitemap>
        <loc>{{ url('/sitemap-prestasi.xml') }}</loc>
        <lastmod>{{ now()->toAtomString() }}</lastmod>
    </sitemap>

</sitemapindex>
