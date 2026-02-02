<div>
    <div class="container pt-5 mt-5">
        <div class="row g-4 align-items-stretch pt-4 pb-4">

            <!-- KOLOM UTAMA -->
            <div class="col-lg-8 col-md-9 col-sm-12">
                <div class="card shadow-sm border-0 mb-4 p-4">

                    <!-- Header -->
                    <h1 class="mb-2 section-title">{!! $profile->name !!}</h1>
                

                    <!-- Hero Image -->
                   
                    <!-- Pesan Selamat Datang -->
                    <div class="mb-4">
                        
                        <div class="summernote-content">
                            {!! $profile->welcome_message !!}
                        </div>
                    </div>

                    <!-- Sejarah -->
                    <div class="mb-4">
                        <span class="badge badge-accent mb-2">
                            <i class="bi bi-clock-history"></i> Sejarah
                        </span>
                        <div class="summernote-content">
                            {!! $profile->history !!}
                        </div>
                    </div>

                    <!-- Visi -->
                    <div class="mb-4">
                        <span class="badge badge-accent mb-2">
                            <i class="bi bi-eye"></i> Visi
                        </span>
                        <div class="summernote-content">
                            {!! $profile->vision !!}
                        </div>
                    </div>

                    <!-- Misi -->
                    <div>
                        <span class="badge badge-accent mb-2">
                            <i class="bi bi-list-check"></i> Misi
                        </span>
                        <div class="summernote-content">
                            {!! $profile->mission !!}
                        </div>
                    </div>

                </div>
            </div>

            <!-- SIDEBAR -->
            <div class="col-lg-4 col-md-3 col-sm-12">

                <!-- Kompetensi Keahlian -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="m-0 section-title">Kompetensi Keahlian</h3>
                    </div>
                    <div class="card-body d-grid gap-2">
                        <div class="p-2 rounded border" style="background: var(--surface); border-color: var(--ring);">
                            Teknik Komputer dan Jaringan
                        </div>
                        <div class="p-2 rounded border" style="background: var(--surface); border-color: var(--ring);">
                            Asisten Keperawatan
                        </div>
                        <div class="p-2 rounded border" style="background: var(--surface); border-color: var(--ring);">
                            Teknik Sepeda Motor
                        </div>
                        <div class="p-2 rounded border" style="background: var(--surface); border-color: var(--ring);">
                            Teknik Pendingin dan Tata Udara
                        </div>
                        <div class="p-2 rounded border" style="background: var(--surface); border-color: var(--ring);">
                            Farmasi Klinis dan Komunitas
                        </div>
                    </div>
                </div>

                <!-- Info Sekolah -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-0 section-title">Informasi Sekolah</h3>
                    </div>
                    <div class="card-body text-muted">
                        <p class="mb-2">
                            <strong>Nama Sekolah</strong><br>
                            {{ $profile->name }}
                        </p>
                        <p class="mb-0">
                            <strong>Status</strong><br>
                            Sekolah Menengah Kejuruan Negeri
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
