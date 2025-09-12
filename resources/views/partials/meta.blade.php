<meta name="title" content="{{ $title ?? $profile->name }}">
<meta name="description" content="{{ $description ?? $profile->vision }}">
<meta name="keywords" content="{{$profile->name}}, {{$profile->short_name}}, sekolah, smk, karang baru, pendidikan, teknologi, kejuruan, vokasi, kompetensi, keahlian, jurusan, siswa, guru, kurikulum, ekstrakurikuler, prestasi, lomba, kegiatan, acara, berita, informasi, pengumuman, alumni, kerja sama, industri, magang, praktik kerja industri   ">
<meta name="author" content="Safrizal">

 <!-- Open Graph -->
<meta property="og:title" content="{{ $title ?? $profile->name }}">
<meta property="og:description" content="{{ $description ?? $provile->welcome_message }}">
<meta property="og:image" content="{{ asset('storage/'. $image ?? $profile->logo) }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
    
<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title ?? $profile->name }}">
<meta name="twitter:description" content="{{ $description ?? $provile->welcome_message }}">
<meta name="twitter:image" content="{{ asset('storage/'. $image ?? $profile->logo) }}">