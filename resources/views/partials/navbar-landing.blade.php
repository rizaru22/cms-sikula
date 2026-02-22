  <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm py-2 fixed-top shadow-lg"  data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
          <img
            src="{{asset('storage/'.$profile->logo)}}"
            alt="Logo SMKN 1 Karang Baru"
            class="navbar-logo"
            style="height: 40px; width: 40px; object-fit: contain"
          />
          <span class="fw-semibold">{{$profile->name}}</span>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#mainNav"
          aria-controls="mainNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-2">
            <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Beranda</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('profile.school')}}">Profil Sekolah</a></li>
              
            
            <li class="nav-item">
              <a class="nav-link" href="{{route('news.list')}}">Berita</a>
            </li>
              
            <li class="nav-item">
              <a class="nav-link" href="{{route('achievement.list')}}">Prestasi</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="{{ route('product.list') }}">Produk</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="{{ route('ppdb.info') }}">PPDB</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="{{ route('lms') }}">LMS</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>