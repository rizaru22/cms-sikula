<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container">
        <div class="row g-4 align-items-stretch pt-4 pb-4 pe-0 ps-0">
            <div class="col-lg-8 col-md-9 col-sm-12"> 
                <div class="card shadow-sm border-0 mb-4 mr-4 ml">
                   
                    <h1 class="mb-3 section-title">{{ $news->title }}</h1>
                    <p class="text-muted">{{ $news->published_at ? $news->published_at->format('d M Y') : 'Draft' }}</p>
                    @if ($news->image)
                        <img src="{{ asset('storage/' . $news->image) }}" alt="Gambar Berita" class="img-fluid mb-3">
                    @endif
                    <div>{!! $news->content !!}</div>

                </div>
            </div>

             <div class="col-lg-4 col-md-3 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h3 class="m-0 section-title">Produk Kami</h3>
              </div>
              <div class="card-body d-grid gap-2">
                <div
                  class="p-2 rounded border"
                  style="
                    background: var(--surface);
                    border-color: var(--ring);
                    min-height: 80px;
                  "
                >
                  <span class="badge badge-accent mb-1"
                    ><i class="bi bi-megaphone"></i> 30 April 2025</span
                  >
                  <h6 class="mb-1" style="font-size: 1rem">
                    PPDB Gelombang 1 Dibuka
                  </h6>
                  <p class="text-muted mb-0" style="font-size: 0.9rem">
                    Pendaftaran peserta didik baru dilakukan secara online.
                  </p>
                </div>
                <div
                  class="p-2 rounded border"
                  style="
                    background: var(--surface);
                    border-color: var(--ring);
                    min-height: 80px;
                  "
                >
                  <span class="badge badge-accent mb-1"
                    ><i class="bi bi-megaphone"></i> 10 Mei 2025</span
                  >
                  <h6 class="mb-1" style="font-size: 1rem">
                    Libur Kenaikan Kelas
                  </h6>
                  <p class="text-muted mb-0" style="font-size: 0.9rem">
                    Kegiatan belajar mengajar kembali aktif pada 20 Mei.
                  </p>
                </div>
                <a class="btn btn-outline-success btn-sm mt-2" href="#"
                  >Semua Pengumuman</a>
              </div>
            </div>
            <div class="card mt-5">
              <div class="card-header">
                <h3 class="m-0 section-title">Berita Lainnya</h3>
              </div>
              <div class="card-body d-grid gap-2">
                <div class="col">
                  <div class="card h-100 shadow-sm">
                    <div class="card-body">
                      <h5 class="card-title">
                        <i class="bi bi-calendar-event text-warning"></i> Ujian
                        Tengah Semester
                      </h5>
                      <p class="card-text">
                        <i class="bi bi-clock"></i> 20 - 25 September 2025
                      </p>
                      <p class="card-text">
                        <i class="bi bi-geo-alt"></i> Ruang Kelas 10 - 12
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100 shadow-sm">
                    <div class="card-body">
                      <h5 class="card-title">
                        <i class="bi bi-calendar-event text-warning"></i>
                        Seminar Karir
                      </h5>
                      <p class="card-text">
                        <i class="bi bi-clock"></i> 12 Oktober 2025, 09:00 WIB
                      </p>
                      <p class="card-text">
                        <i class="bi bi-geo-alt"></i> Aula Sekolah
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card h-100 shadow-sm">
                    <div class="card-body">
                      <h5 class="card-title">
                        <i class="bi bi-calendar-event text-warning"></i> Lomba
                        Futsal Antar Kelas
                      </h5>
                      <p class="card-text">
                        <i class="bi bi-clock"></i> 5 Oktober 2025, 08:00 WIB
                      </p>
                      <p class="card-text">
                        <i class="bi bi-geo-alt"></i> Lapangan Utama
                      </p>
                    </div>
                  </div>
                </div>
                <a class="btn btn-outline-success btn-sm mt-2" href="#"
                  >Lihat Agenda Sekolah </a>
              </div>
            </div>
          </div>
        </div>

    </div>
