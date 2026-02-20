<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container pt-5 mt-5">
        <div class="row g-4 align-items-stretch pt-4 pb-4 pe-0 ps-0">
            <div class="col-lg-8 col-md-9 col-sm-12"> 
                <div class="card shadow-sm border-0 mb-4 mr-4 ml p-4">
                   
                    <h1 class="mb-3 section-title">{{ $news->title }}</h1>
                    <p class="text-muted">{{ $news->published_at ? $news->published_at->format('j F Y') : 'Draft' }}</p>
                    @if ($news->image)
                        <img src="{{ asset('storage/' . $news->image) }}" alt="Gambar Berita" class="img-fluid mb-3" loading="lazy" >
                    @endif
                    <div>{!! $news->content !!}</div>

                </div>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-12">
       
            <div class="card mt-5">
              <div class="card-header">
                <h3 class="m-0 section-title">Berita Lainnya</h3>
              </div>
              <div class="card-body d-flex flex-column gap-3">
                  @foreach($berita_lainnya as $berita)
                            <div class="d-flex align-items-center border rounded p-2"
                                style="background: var(--surface); border-color: var(--ring);">
                                <img src="{{ asset('storage/'.$berita->image) }}"
                                    alt="{{ $berita->title }}" class="rounded me-3"
                                    style="width: 70px; height: 70px; object-fit: cover;" loading="lazy">
                                <div class="flex-grow-1 overflow-hidden" style="min-width: 0;">
                                    <a href="{{ route('news.detail', $berita->slug) }}"
                                        class="h6 mb-1 d-block text-decoration-none title-c">
                                        {{ $berita->title }}
                                    </a>
                                    <small class="text-muted">
                                        {{ $berita->published_at->format('d F Y') }}
                                    </small>
                                </div>
                            </div>
                        @endforeach
                <a class="btn btn-outline-success btn-sm mt-2" href="{{ route('news.list') }}"
                  >Lihat Berita Lainnya</a>
              </div>
            </div>
          </div>
        </div>

    </div>
