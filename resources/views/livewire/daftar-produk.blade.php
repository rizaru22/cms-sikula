<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container mt-5 pt-5">
        <div class="row mt-4  mb-4">
            <div class="col-12">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h2 class="m-0">Daftar Produk</h2>
                    </div>
                    <div class="card-body d-grid gap-2">

                        <div class="row">
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Cari produk..."
                                    wire:model.live.debounce.500ms="search" id="search" name="search">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @forelse ($daftar_produk as $produk)
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="h-100">
                                        <div class="card h-100 shadow-sm">
                                            <img src="{{ asset('storage/' . $produk->image) }}" class="card-img-top"
                                                alt="Gambar Produk" loading="lazy" >
                                            
                                            <div class="card-body">
                                                <h5 class="card-title"> <a
                                                        href="{{ route('product.detail', $produk->slug) }}"
                                                        class="link-accent-title">{{ \Illuminate\Support\Str::limit(strip_tags($produk->name), 70, '...') }}</a>
                                                </h5>
                                                
                                                <p class="card-text mt-3">
                                                    {!! \Illuminate\Support\Str::limit(strip_tags($produk->description), 100, '...') !!}
                                                </p>
                                                @php
                                    $waNumber = preg_replace('/\D/','',$produk->contact_person);
                                    $message = urlencode("Halo, saya tertarik dengan produk {$produk->name}. Apakah masih tersedia?");
                                    @endphp
                                    <div class="d-flex gap-2">
                                        <a href="/produk/{{ $produk->slug }}" class="btn btn-sm btn-outline-success">
                                            <i class="bi bi-info-circle"></i> Detail
                                        </a>
                                        <a href="https://wa.me/{{ $waNumber }}?text={{ $message }}" target="_blank"
                                            class="btn btn-sm btn-success">
                                            <i class="bi bi-whatsapp"></i> Pesan
                                        </a>
                                    </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center">Produk tidak ditemukan</p>
                                </div>
                            @endforelse

                        </div>

                    </div>
                    <div class="card-footer bg-white d-flex justify-content-center border-0">
                        {{ $daftar_produk->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
