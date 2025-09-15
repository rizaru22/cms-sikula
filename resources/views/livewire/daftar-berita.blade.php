<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-12">
                <div class="card mb-4 shadow-sm">

                    <div class="card-body d-grid gap-2">
                        <h3 class="m-0 ">Berita Terbaru</h3>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($daftar_berita as $berita)
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="h-100">
                                        <div class="card h-100 shadow-sm">
                                            <img src="{{ asset('storage/' . $berita->image) }}" class="card-img-top"
                                                alt="Gambar Berita">
                                                
                                            <div class="card-body">
                                                <h5 class="card-title"> <a href="{{ route('news.detail', $berita->slug) }}"
                                                        class="link-accent-title">{{ \Illuminate\Support\Str::limit(strip_tags($berita->title), 70, '...') }}</a>
                                                </h5>
                                                <small class="text-muted ">Diterbitkan pada
                                                    {{ $berita->published_at->format('d F Y') }}
                                                </small>
                                                <p class="card-text mt-3">
                                                    {!! \Illuminate\Support\Str::limit(strip_tags($berita->content), 100, '...') !!}
                                                </p>
                                                <a href="{{ route('news.detail', $berita->slug) }}"
                                                    class="link-accent">Baca selengkapnya <i
                                                        class="bi bi-arrow-right"></i></a>
                                            </div>
                                    
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                    <div class="card-footer bg-white d-flex justify-content-center border-0">
                        {{ $daftar_berita->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
