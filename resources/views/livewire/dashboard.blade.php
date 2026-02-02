@push('head')
    <link rel="preload" as="image" href="{{ asset('storage/' . $carousels->first()->image) }}">
@endpush
<div>
    <!-- Carousel -->
    <div id="carouselElegant" class="carousel slide carousel-fade mt-3 pt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($carousels as $carousel)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $carousel->image) }}" class="d-block w-100 elegant-img"
                        alt="{{ $profile->short_name }}-{{ $loop->iteration }}" style="height: 70vh; object-fit: cover">
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselElegant" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselElegant" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- BERITA (8) + PENGUMUMAN (4) -->
    <section id="beranda" class="py-5">
        <div class="container ps-3 pe-3">
            <div class="row g-4 align-items-stretch">
                <!-- Berita (Grid 8) -->
                <div class="col-lg-8 col-md-9 col-sm-12">
                    <div class="card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="m-0 section-title">Berita Terbaru</h3>
                            <a class="btn btn-sm btn-primary" href="{{ route('news.list') }}"><i
                                    class="bi-box-arrow-up-right me-1"></i>Lihat Semua</a>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <!-- item berita -->
                                @foreach ($news as $item)
                                    <div class="col-md-4 col-sm-6 col-12">
                                        <article class="card h-100">
                                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                                alt="{{ $item->title }}" loading="lazy">
                                            <div class="card-body">
                                                <small class="text-muted d-block mb-2">
                                                    <i class="bi bi-calendar-event"></i>
                                                    {{ tglIndo($item->published_at) }}
                                                </small>
                                                <h5 class="card-title"> <a
                                                        href="{{ route('news.detail', $item->slug) }}"
                                                        class="link-accent-title">{{ \Illuminate\Support\Str::limit(strip_tags($item->title), 50, '...') }}</a>
                                                </h5>
                                                <p class="card-text ">
                                                    {!! \Illuminate\Support\Str::limit(strip_tags($item->content), 100, '...') !!}
                                                </p>
                                                <a href="{{ route('news.detail', $item->slug) }}"
                                                    class="link-accent">Baca selengkapnya <i
                                                        class="bi bi-arrow-right"></i></a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <!-- Pagination Berita -->
                        <div class="card-footer bg-white d-flex justify-content-center border-0">
                            {{ $news->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>

                <!-- Pengumuman (Grid 4) -->
                <div class="col-lg-4 col-md-3 col-sm-12">
                    <!-- Product -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-0 section-title">Produk</h3>
                        </div>
                        <div class="card-body d-grid gap-3">

                            <!-- Item Produk -->
                            <div class="d-flex align-items-center border rounded p-2"
                                style="background: var(--surface); border-color: var(--ring);">
                                <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1200&auto=format&fit=crop"
                                    alt="Produk 1" class="rounded me-3"
                                    style="width: 70px; height: 70px; object-fit: cover;" loading="lazy">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Seragam Batik</h6>
                                    <p class="text-muted mb-1" style="font-size: 0.9rem;">Rp120.000</p>
                                    <div class="d-flex gap-2">
                                        <a href="/produk/kaos-olahraga" class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-info-circle"></i> Detail
                                        </a>
                                        <a href="https://wa.me/6281234567890" target="_blank"
                                            class="btn btn-sm btn-success">
                                            <i class="bi bi-whatsapp"></i> Hubungi
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Item Produk -->
                            <div class="d-flex align-items-center border rounded p-2"
                                style="background: var(--surface); border-color: var(--ring);">
                                <img src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1200&auto=format&fit=crop"
                                    alt="Produk 2" class="rounded me-3"
                                    style="width: 70px; height: 70px; object-fit: cover;" loading="lazy">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Kaos Olahraga</h6>
                                    <p class="text-muted mb-1" style="font-size: 0.9rem;">Rp85.000</p>
                                    <div class="d-flex gap-2">
                                        <a href="/produk/kaos-olahraga" class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-info-circle"></i> Detail
                                        </a>
                                        <a href="https://wa.me/6281234567890" target="_blank"
                                            class="btn btn-sm btn-success">
                                            <i class="bi bi-whatsapp"></i> Hubungi
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <a class="btn btn-outline-success btn-sm mt-2" href="#">
                                Lihat Semua Produk
                            </a>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="m-0 section-title">Pengumuman</h3>
                        </div>
                        <div class="card-body d-grid gap-2">
                            <div class="p-2 rounded border"
                                style="
                    background: var(--surface);
                    border-color: var(--ring);
                    min-height: 80px;
                  ">
                                <span class="badge badge-accent mb-1"><i class="bi bi-megaphone"></i> 30 April
                                    2025</span>
                                <h6 class="mb-1" style="font-size: 1rem">
                                    PPDB Gelombang 1 Dibuka
                                </h6>
                                <p class="text-muted mb-0" style="font-size: 0.9rem">
                                    Pendaftaran peserta didik baru dilakukan secara online.
                                </p>
                            </div>
                            <div class="p-2 rounded border"
                                style="
                    background: var(--surface);
                    border-color: var(--ring);
                    min-height: 80px;
                  ">
                                <span class="badge badge-accent mb-1"><i class="bi bi-megaphone"></i> 10 Mei
                                    2025</span>
                                <h6 class="mb-1" style="font-size: 1rem">
                                    Libur Kenaikan Kelas
                                </h6>
                                <p class="text-muted mb-0" style="font-size: 0.9rem">
                                    Kegiatan belajar mengajar kembali aktif pada 20 Mei.
                                </p>
                            </div>
                            <a class="btn btn-outline-success btn-sm mt-2" href="#">Semua Pengumuman</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PRESTASI TERBARU -->
    <section id="prestasi" class="py-5" style="background: var(--primary-50)">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="section-title m-0">Prestasi Terbaru</h3>
                <a href="{{ route('achievement.list') }}" class="btn btn-primary btn-sm"><i
                        class="bi-box-arrow-up-right me-1"></i>Lihat Semua</a>
            </div>
            <div class="row g-4">
                @foreach ($achievement as $item)
                    <div class="col-md-4">
                        <div class="card h-100">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                    alt="{{ $item->title }}" loading="lazy">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" class="card-img-top"
                                    alt="{{ $item->title }}" loading="lazy">
                            @endif
                            <div class="card-body">
                                <span class="badge badge-accent mb-2"><i class="bi bi-calendar-event"></i>
                                    {{ tglIndo($item->date) }}</span>
                                <span class="badge badge-accent mb-2"><i class="bi bi-award"></i>
                                   
                                    {{ $item->category_achievement->name }}</span>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-trophy fs-3 me-2 text-warning"></i>
                                    <h5 class="m-0">{{ $item->title }}</h5>
                                </div>
                                <p class="text-muted">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>{{-- Because she competes with no one, no one can compete with her. --}}
</div>
