<div>
    {{-- In work, do what you enjoy. --}}
         <div class="container">
        <div class="row g-4 align-items-stretch">
        <div class="col-8 pt-4 pb-4 pe-4 ps-0">
        <div class="card shadow-sm border-0 mb-4 mr-4 ml">
            <h1 class="mb-3">{{ $news->title }}</h1>
            <p class="text-muted">{{ $news->published_at ? $news->published_at->format('d M Y') : 'Draft' }}</p>
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="Gambar Berita" class="img-fluid mb-3">
            @endif
            <div>{!! $news->content !!}</div>

        </div>
        </div>
    </div>

</div>
