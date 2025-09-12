<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{$profile->short_name}} || {{$title??''}}</title>
    @include('partials.meta')
        <!-- Bootstrap 5.3 CDN -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Bootstrap Icons -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
      rel="stylesheet"
    />
   <link rel="stylesheet" href="{{ asset('css/landing.css') }}" />
   @livewireStyles
  </head>
  <body>
  @include('partials.navbar-landing')

    <div class="content">
     {{$slot}}
    </div>

    <!-- FOOTER -->
    <footer class="pt-0 mt-0">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-4">
            <h5 class="mb-3">{{$profile->name}}</h5>
            <p class="mb-0">{{$profile->vision}}</p>
          </div>
          <div class="col-md-4">
            <h6 class="mb-3">Kontak</h6>
            <ul class="list-unstyled small">
              <li><i class="bi bi-geo-alt"></i>&nbsp;{{$profile->address}}</li>
              <li><i class="bi bi-telephone"></i>&nbsp;{{$profile->phone}}</li>
              <li><i class="bi bi-envelope"></i>&nbsp;{{$profile->email}}</li>
            </ul>
          </div>
          <div class="col-md-4">
            <h6 class="mb-3">Tautan</h6>
            <ul class="list-unstyled small">
              <li><a href="#">PPDB</a></li>
              <li><a href="#">Kalender Akademik</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
        <div
          class="border-top border-light-subtle mt-4 pt-3 pb-4 d-flex justify-content-between small"
        >
          <span>© 2025  {{config('app.name')}}-{{config('app.version')}}</span>
          <span>Dibuat dengan Bootstrap 5</span>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @livewireScripts
  </body>
</html>
