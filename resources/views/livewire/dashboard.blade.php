<div>
    <!-- Carousel -->
    <div id="schoolCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
      @foreach($carousels as $carousel)
            <div class="carousel-item {{$loop->first?'active':''}}">
          <img
            src="{{asset('storage/'.$carousel->image)}}"
            class="d-block w-100"
            alt="{{$profile->short_name}}-{{$loop->iteration}}"
            style="height: 400px; object-fit: cover"
          />
        </div>
      @endforeach
    

      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#schoolCarousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#schoolCarousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    <!-- BERITA (8) + PENGUMUMAN (4) -->
    <section id="beranda" class="py-5">
      <div class="container">
        <div class="row g-4 align-items-stretch">
          <!-- Berita (Grid 8) -->
          <div class="col-lg-8">
            <div class="card h-100">
              <div
                class="card-header d-flex justify-content-between align-items-center"
              >
                <h3 class="m-0 section-title">Berita Terbaru</h3>
                <a class="btn btn-sm btn-primary" href="#berita">Lihat Semua</a>
              </div>
              <div class="card-body">
                <div class="row g-4">
                  <!-- item berita -->
                  <div class="col-md-6">
                    <article class="card h-100">
                      <img
                        src="https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1200&auto=format&fit=crop"
                        class="card-img-top"
                        alt="Berita 1"
                      />
                      <div class="card-body">
                        <h5 class="card-title">Kegiatan MPLS 2025</h5>
                        <p class="card-text text-muted">
                          Pengenalan lingkungan sekolah berjalan tertib dan
                          menyenangkan.
                        </p>
                        <a href="#" class="link-accent"
                          >Baca selengkapnya <i class="bi bi-arrow-right"></i
                        ></a>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <article class="card h-100">
                      <img
                        src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?q=80&w=1200&auto=format&fit=crop"
                        class="card-img-top"
                        alt="Berita 2"
                      />
                      <div class="card-body">
                        <h5 class="card-title">Peresmian Laboratorium Baru</h5>
                        <p class="card-text text-muted">
                          Menunjang proses pembelajaran praktik siswa.
                        </p>
                        <a href="#" class="link-accent"
                          >Baca selengkapnya <i class="bi bi-arrow-right"></i
                        ></a>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <article class="card h-100">
                      <img
                        src="assets/images/1.jpg"
                        class="card-img-top"
                        alt="Berita 3"
                      />
                      <div class="card-body">
                        <h5 class="card-title">Workshop Kewirausahaan</h5>
                        <p class="card-text text-muted">
                          Mendorong jiwa edutechnopreneur siswa.
                        </p>
                        <a href="#" class="link-accent"
                          >Baca selengkapnya <i class="bi bi-arrow-right"></i
                        ></a>
                      </div>
                    </article>
                  </div>
                  <div class="col-md-6">
                    <article class="card h-100">
                      <img
                        src="https://images.unsplash.com/photo-1511988617509-a57c8a288659?q=80&w=1200&auto=format&fit=crop"
                        class="card-img-top"
                        alt="Berita 4"
                      />
                      <div class="card-body">
                        <h5 class="card-title">Lomba Cerdas Cermat</h5>
                        <p class="card-text text-muted">
                          Tim sekolah meraih juara 1 tingkat kabupaten.
                        </p>
                        <a href="#" class="link-accent"
                          >Baca selengkapnya <i class="bi bi-arrow-right"></i
                        ></a>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
              <!-- Pagination Berita -->
              <div class="card-footer bg-white d-flex justify-content-center">
                <nav aria-label="Pagination berita">
                  <ul class="pagination my-0">
                    <li class="page-item disabled">
                      <span class="page-link">&laquo;</span>
                    </li>
                    <li class="page-item active">
                      <span class="page-link">1</span>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">&raquo;</a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>

          <!-- Pengumuman (Grid 4) -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h3 class="m-0 section-title">Pengumuman</h3>
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
                <h3 class="m-0 section-title">Agenda Sekolah</h3>
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
    </section>

    <!-- PRESTASI TERBARU -->
    <section id="prestasi" class="py-5" style="background: var(--primary-50)">
      <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h3 class="section-title m-0">Prestasi Terbaru</h3>
          <a href="#" class="btn btn-primary btn-sm">Lihat Semua</a>
        </div>
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card h-100">
              <img
                src="assets/images/carousel3.jpg"
                class="card-img-top"
                alt="Juara LKS Web"
              />
              <div class="card-body">
                <span class="badge badge-accent mb-2"
                  ><i class="bi bi-calendar-event"></i> 12 Juli 2025</span
                >
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-trophy fs-3 me-2 text-warning"></i>
                  <h5 class="m-0">Juara LKS Web</h5>
                </div>
                <p class="text-muted">
                  Siswa meraih medali emas pada Lomba Kompetensi Siswa tingkat
                  provinsi.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <img
                src="assets/images/carousel2.jpg"
                class="card-img-top"
                alt="Juara Futsal"
              />
              <div class="card-body">
                <span class="badge badge-accent mb-2"
                  ><i class="bi bi-calendar-event"></i> 28 Juni 2025</span
                >
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-trophy fs-3 me-2 text-warning"></i>
                  <h5 class="m-0">Juara Futsal</h5>
                </div>
                <p class="text-muted">
                  Tim futsal sekolah menjuarai turnamen antar pelajar kabupaten.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card h-100">
              <img
                src="assets/images/carousel1.jpg"
                class="card-img-top"
                alt="Paduan Suara"
              />
              <div class="card-body">
                <span class="badge badge-accent mb-2"
                  ><i class="bi bi-calendar-event"></i> 15 Mei 2025</span
                >
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-trophy fs-3 me-2 text-warning"></i>
                  <h5 class="m-0">Paduan Suara</h5>
                </div>
                <p class="text-muted">
                  Meraih juara favorit pada festival seni sekolah se-Provinsi.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>{{-- Because she competes with no one, no one can compete with her. --}}
</div>
