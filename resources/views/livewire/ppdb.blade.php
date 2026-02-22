<div>

    <!-- ================= HERO SECTION ================= -->
    <section class="ppdb-hero position-relative text-white py-5 mt-5">
        <div class="overlay"></div>
        <div class="container text-center position-relative">
            
            <span class="badge bg-warning text-dark mb-3">
                PPDB {{ $ppdb->tahun_ajaran }}
            </span>

            <h1 class="fw-bold display-5 mb-3">
                {{ $ppdb->title }}
            </h1>

            @if($ppdb->is_active)
                <span class="badge bg-success px-3 py-2">
                    Sedang Dibuka
                </span>
            @endif

        </div>
    </section>


    <!-- ================= CONTENT SECTION ================= -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mx-auto">

                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-body p-4 p-md-5">

                            <div class="ppdb-content">
                                {!! $ppdb->content !!}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>