  <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm py-2 fixed-top shadow-lg"  data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="route('home')">
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
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                >Profil</a
              >
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#sambutan"
                    >Kata Sambutan Kepala Sekolah</a
                  >
                </li>
                <li><a class="dropdown-item" href="#sejarah">Sejarah</a></li>
                <li>
                  <a class="dropdown-item" href="#visimisi">Visi dan Misi</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#prodi">Program Studi</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('news.list')}}">Berita</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                >Prestasi</a
              >
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#prestasi">LKS</a></li>
                <li><a class="dropdown-item" href="#prestasi">Olah Raga</a></li>
                <li>
                  <a class="dropdown-item" href="#prestasi">Ekstrakurikuler</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>