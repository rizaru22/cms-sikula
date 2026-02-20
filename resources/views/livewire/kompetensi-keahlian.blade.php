<div>

    <!-- ================= HERO SECTION ================= -->
    <section class="kompetensi-hero py-5 mt-5">
        <div class="container text-center">

            <img src="{{ asset('storage/'.$kompetensi->logo) }}"
                 alt="{{ $kompetensi->nama }}"
                 class="mb-4"
                 style="height:150px;object-fit:contain;">

            <h2 class="display-4 fw-bold">
                {{ $kompetensi->name }}
            </h2>

        </div>
    </section>


    <!-- ================= CONTENT SECTION ================= -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">

                    <div class="kompetensi-content">
                        {!! $kompetensi->description !!}
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- ================= CTA SECTION ================= -->
    <section class="py-5 bg-light">
        <div class="container text-center">

            <h4 class="mb-3">
                Tertarik bergabung dengan jurusan ini?
            </h4>

            <a href="#"
               class="btn btn-success px-4 py-2">
                Daftar Sekarang
            </a>

        </div>
    </section>


    <!-- ================= KOMPETENSI LAINNYA ================= -->
    @if($kompetensi_lainnya->count())
    <section class="py-5">
        <div class="container">

            <h3 class="section-title text-center mb-4">
                Kompetensi Lainnya
            </h3>

            <div class="row g-4">
                @foreach($kompetensi_lainnya as $item)
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">

                            <img src="{{ asset('storage/'.$item->logo) }}"
                                 alt="{{ $item->nama }}"
                                 style="height:80px;object-fit:contain;"
                                 class="mb-2">

                            <h6 class="mb-2">{{ $item->nama }}</h6>

                            <a href="{{ route('kompetensi.detail',$item->slug) }}"
                               class="btn btn-outline-success btn-sm">
                               Lihat
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    @endif

</div>