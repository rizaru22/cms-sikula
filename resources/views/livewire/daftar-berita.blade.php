<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container mt-5 pt-5">
        <div class="row mt-4  mb-4">
            <div class="col-12">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h2 class="m-0">Daftar Berita</h2>
                    </div>
                    <div class="card-body d-grid gap-2">

                        <div class="row">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Cari berita..."
                                    wire:model.live.debounce.500ms="search" id="search" name="search">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @forelse ($daftar_berita as $berita)
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="h-100">
                                        <div class="card h-100 shadow-sm">
                                            <img src="{{ asset('storage/' . $berita->image) }}" class="card-img-top"
                                                alt="Gambar Berita" loading="lazy" >
                                            
                                            <div class="card-body">
                                                <h5 class="card-title"> <a
                                                        href="{{ route('news.detail', $berita->slug) }}"
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
                            @empty
                                <div class="col-12">
                                    <p class="text-center">Berita tidak ditemukan</p>
                                </div>
                            @endforelse

                        </div>

                    </div>
                    <div class="card-footer bg-white d-flex justify-content-center border-0">
                        {{ $daftar_berita->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
