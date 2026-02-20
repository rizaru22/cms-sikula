<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container mt-5 pt-5">
        <div class="row mt-4 mb-4">
            <div class="col-12">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h2 class="m-0">Daftar Prestasi</h2>
                    </div>
                    <div class="card-body d-grid gap-2">
                        <div class="row">
                            <h5>Filter:</h5>
                            <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                                  <input type="text" class="form-control" placeholder="Cari berita..."
                                    wire:model.live.debounce.500ms="search" id="search" name="search">
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                <select class="form-select" wire:model.live="category" aria-label="Filter Kategori Prestasi">
                                    <option value="">Semua Kategori</option>
                                    @foreach (\App\Models\CategoryAchievement::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                <select class="form-select" wire:model.live="year" aria-label="Filter Kategori Prestasi">
                                    <option value="">Semua Tahun</option>
                                    @foreach (range(date('Y'), 2015) as $tahun)
                                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                                    @endforeach
                                </select>

                            </div>
                            
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 g-4 mt-1">
                            @forelse ($daftar_prestasi as $prestasi)
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="h-100">
                                        <div class="card h-100 shadow-sm">
                                            @if ($prestasi->image)
                                                <img src="{{ asset('storage/' . $prestasi->image) }}"
                                                    class="card-img-top" alt="Gambar prestasi {{ $prestasi->title }}">
                                            @else
                                                <img src="{{ asset('images/no-image.png') }}" class="card-img-top"
                                                    alt="Gambar prestasi {{ $prestasi->title }}">
                                            @endif


                                            <div class="card-body">
                                                <span class="badge badge-accent mb-2"><i
                                                        class="bi bi-calendar-event"></i>
                                                    {{ tglIndo($prestasi->date) }}</span>
                                                <span class="badge badge-accent mb-2"><i class="bi bi-award"></i>

                                                    {{ $prestasi->category_achievement->name }}</span>
                                                <h5 class="card-title"><a href="{{ route('achievement.detail', $prestasi->slug) }}" class="link-accent-title">
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($prestasi->title), 70, '...') }}
                                                </a></h5>

                                                <p class="card-text mt-3">
                                                    {{ $prestasi->description }}
                                                </p>
                                                  <div class="d-flex justify-content-end">
                                    <a href="{{ route('achievement.detail', $prestasi->slug) }}" 
                                    class="btn btn-sm btn-outline-success">
                                    Selengkapnya <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center">Prestasi tidak ditemukan</p>
                                </div>
                            @endforelse


                        </div>

                    </div>
                    <div class="card-footer bg-white d-flex justify-content-center border-0">
                        {{ $daftar_prestasi->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
