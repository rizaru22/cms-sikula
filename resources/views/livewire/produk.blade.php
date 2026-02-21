<div>
      <div class="content pt-5 m-5">
        <div class="container pt-4">
            <div class="row g-4 align-items-stretch">
                <!-- KOLOM UTAMA: DETAIL PRODUK -->
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 p-4 mb-4">
                        <div class="row g-4">
                            <!-- Foto Produk -->
                            <div class="col-md-6">
                                @php
    $mainImage = $product->image 
        ? asset('storage/'.$product->image) 
        : asset('images/no-image.png');

    $gallery = $product->gallery ?? [];
@endphp

<div class="col-md-6">
    <img src="{{ $mainImage }}"
         id="mainImage"
         class="product-main-img shadow-sm mb-3"
         alt="{{ $product->name }}">

    <div class="row g-2">

        {{-- Thumbnail utama --}}
        <div class="col-3">
            <img src="{{ $mainImage }}"
                 class="thumb-img active"
                 onclick="changeImage(this.src, this)">
        </div>

        {{-- Gallery --}}
        @foreach($gallery as $img)
            <div class="col-3">
                <img src="{{ asset('storage/'.$img) }}"
                     class="thumb-img"
                     onclick="changeImage(this.src, this)">
            </div>
        @endforeach

    </div>
</div>
                            </div>

                            <!-- Deskripsi Singkat -->
                            <div class="col-md-6 d-flex flex-column">
                               
    
    @if($product->stock > 0)
        <span class="badge bg-success mb-2 align-self-start">Ready</span>
    @else
        <span class="badge bg-danger mb-2 align-self-start">Habis</span>
    @endif


<h1 class="section-title h2 mb-2">
    {{ $product->name }}
</h1>

<p class="text-muted small mb-3">
    Produk/Jasa Kreatif Siswa
</p>

<div class="price-text mb-4">
    Rp {{ number_format($product->price, 0, ',', '.') }}
</div>

<div class="mb-4">
    <h6 class="fw-bold mb-2">Deskripsi:</h6>
    <div class="text-muted small">
        {!! $product->description !!}
    </div>
</div>
@php
$waNumber = preg_replace('/\D/','',$product->contact_person);
$message = urlencode("Halo, saya tertarik dengan produk {$product->name}. Apakah masih tersedia?");
@endphp

<a href="https://wa.me/{{ $waNumber }}?text={{ $message }}"
   target="_blank"
   class="btn btn-order w-100 mb-2">
   <i class="bi bi-whatsapp me-2"></i> Pesan via WhatsApp
</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR: PRODUK & BERITA LAINNYA (Sesuai Referensi) -->
                <div class="col-lg-4">
                    <!-- Produk Populer -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header">
                            <h5 class="m-0 section-title" style="font-size: 1.1rem">Produk Lainnya</h5>
                        </div>
                        <div class="card-body d-grid gap-3">
                          @forelse($otherProducts as $item)
    
        <div class="d-flex align-items-center gap-3 p-2 border rounded shadow-xs mb-2"
             style="background: var(--surface)">
            
            <img src="{{ asset('storage/'.$item->image) }}"
                 class="sidebar-card-img"
                 alt="{{ $item->name }}">

            <div>
                <h6 class="mb-0" style="font-size: 0.9rem">
                    {{ $item->name }}
                </h6>
                <span class="text-muted  small">
                    Rp {{ number_format($item->price,0,',','.') }}
                </span>
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
    
    <a href="{{ route('product.list') }}" class="btn btn-outline-success btn-sm">Lihat Semua Produk</a>
@empty
    <p class="text-muted mb-0">Tidak ada produk lain tersedia.</p>
@endforelse
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
function changeImage(src, element) {
    document.getElementById('mainImage').src = src;

    document.querySelectorAll('.thumb-img')
        .forEach(img => img.classList.remove('active'));

    element.classList.add('active');
}
</script>
</div>
