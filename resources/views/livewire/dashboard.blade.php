
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
                        <div class="card-header d-flex justify-content-between align-items-center" data-aos="fade-up">
                            <h3 class="m-0 section-title" >Berita Terbaru</h3>
                            <a class="btn btn-sm btn-primary" href="{{ route('news.list') }}"><i
                                    class="bi-box-arrow-up-right me-1"></i>Lihat Semua</a>
                        </div>
                        <div class="card-body">
                            <div class="row g-4">
                                <!-- item berita -->
                                @foreach ($news as $index => $item)
                                    <div class="col-md-4 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
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
                    <div class="card" data-aos="fade-left">
                        <div class="card-header">
                            <h3 class="m-0 section-title">Produk</h3>
                        </div>
                        <div class="card-body d-grid gap-3">
                            @foreach ($products as $item)
                                 <div class="d-flex align-items-center border rounded p-2"
                                style="background: var(--surface); border-color: var(--ring);">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    alt="{{ $item->name }}" class="rounded me-3"
                                    style="width: 70px; height: 70px; object-fit: cover;" loading="lazy">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $item->name }}</h6>
                                    <p class="text-muted mb-1" style="font-size: 0.9rem;">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                    @php
                                    $waNumber = preg_replace('/\D/','',$item->contact_person);
                                    $message = urlencode("Halo, saya tertarik dengan produk {$item->name}. Apakah masih tersedia?");
                                    @endphp
                                    <div class="d-flex gap-2">
                                        <a href="/produk/{{ $item->slug }}" class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-info-circle"></i> Detail
                                        </a>
                                        <a href="https://wa.me/{{ $waNumber }}?text={{ $message }}" target="_blank"
                                            class="btn btn-sm btn-success">
                                            <i class="bi bi-whatsapp"></i> Pesan
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Item Produk -->
                          

                            <!-- Item Produk -->
                           

                            <a class="btn btn-outline-success btn-sm mt-2" href="{{ route('product.list') }}">
                                Lihat Semua Produk
                            </a>
                        </div>
                    </div>

                    <div class="card mt-5" data-aos="fade-left" data-aos-delay="100">
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
                    <div class="col-md-4" data-aos="zoom-in" data-aos-delay="{{ ($loop->iteration % 3) * 100 }}">
                        <div class="card h-100">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                                    alt="{{ $item->title }}" loading="lazy">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" class="card-img-top"
                                    alt="{{ $item->title }}" loading="lazy">
                            @endif
                                                        <div class="card-body">
                                <span class="badge badge-accent mb-2">
                                    <i class="bi bi-calendar-event"></i>
                                    {{ tglIndo($item->date) }}
                                </span>

                                <span class="badge badge-accent mb-2">
                                    <i class="bi bi-award"></i>
                                    {{ $item->category_achievement->name }}
                                </span>

                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-trophy fs-3 me-2 text-warning"></i>
                                    <h5 class="m-0">{{ $item->title }}</h5>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('achievement.detail', $item->slug) }}" 
                                    class="btn btn-sm btn-outline-success">
                                    Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>{{-- Because she competes with no one, no one can compete with her. --}}

    <section class="kompetensi-section py-5" id="kompetensi">
    <div class="container">

        <div class="row mb-4">
            <div class="col text-center">
                <h3 class="section-title" data-aos="fade-up">
                    Kompetensi Keahlian
                </h3>
                <p class="text-muted" data-aos="fade-up" data-aos-delay="100">
                    Program keahlian unggulan yang kami miliki
                </p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($kompetensi as $index => $item)
                <div class="col-md-4 col-sm-6"
                     data-aos="fade-up"
                     data-aos-delay="{{ ($index % 3) * 100 }}">

                    <div class="card kompetensi-card h-100 border-0 shadow-sm">
                        <div class="text-center p-4">

                            <img src="{{ asset('storage/'.$item->logo) }}"
                                 alt="{{ $item->nama }}"
                                 class="kompetensi-logo mb-3">

                            <h5 class="fw-bold">
                                {{ $item->name }}
                            </h5>

                            <p class="text-muted small">
                                {{\Illuminate\Support\Str::limit(strip_tags($item->description), 120) }}
                            </p>

                            <a href="{{ route('kompetensi.detail', $item->slug) }}"
                               class="btn btn-outline-success btn-sm mt-2">
                                Lihat Detail
                            </a>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
</div>
