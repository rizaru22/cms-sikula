<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{$profile->short_name}} || {{$title??''}}</title>
  @php
    $faviconPath = storage_path('app/public/logos/favicon.png');
    $faviconUrl = asset('storage/logos/favicon.png');
    $faviconVersion = file_exists($faviconPath) ? '?v=' . filemtime($faviconPath) : '';
@endphp

<link rel="icon" type="image/png" href="{{ $faviconUrl . $faviconVersion }}">

    <link rel="apple-touch-icon" sizes="180x180" type="image/png" href="{{ $faviconUrl . $faviconVersion }}">

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
   <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
   @if(file_exists(public_path('css/theme.css')))
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
  @endif
  @stack('head')
   @livewireStyles
  </head>
  <body>
  @include('partials.navbar-landing')

    <div class="content">
     {{$slot}}
    </div>

    <!-- FOOTER -->
    <footer class="pt-0 mt-0" data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row g-4">
          <div class="col-md-4">
            <h5 class="mb-3">{{$profile->name}}</h5>
            <p class="mb-0">{!! $profile->vision !!}</p>
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
            @foreach($links as $link)<li><a href="{{$link->url}}" class="text-decoration-none">{{$link->name}}</a></li>
            @endforeach
            </ul>
          </div>
        </div>
        <div
          class="border-top border-light-subtle mt-4 pt-1 pb-4 d-flex justify-content-between"
        >
          <span class="small">© 2025  {{config('app.name')}}-{{config('app.version')}}</span>
          @include('partials.socialmedia')
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    @livewireScripts(['defer' => true])
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
          document.addEventListener('DOMContentLoaded', function () {
              AOS.init({
                  duration: 700,
                  easing: 'ease-in-out',
                  once: true,
                  offset: 80
              });
          });

          document.addEventListener("livewire:navigated", () => {
              AOS.refresh();
          });
    </script>
  </body>
</html>
