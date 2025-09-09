<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
 <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-NlsxdkweGA8nr9s0TVc3Qu2zqhWMNsHrvzMpAjVR0yDqXgC2z+RWYoeCNG2uO2MC" crossorigin="anonymous">

</head>
<body class="c-app">
  <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
      <span>School Admin</span>
    </div>
    <ul class="c-sidebar-nav">
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.profile.index') }}">Profil</a></li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.news.index') }}">Berita</a></li>
      <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.achievement.index') }}">Prestasi</a></li>
    </ul>
  </div>
  <div class="c-wrapper">
    <header class="c-header c-header-light c-header-fixed">
      <div class="c-header-brand">School Admin</div>
      <ul class="c-header-nav ml-auto mr-4">
        <li class="c-header-nav-item"><a class="c-header-nav-link" href="#">Logout</a></li>
      </ul>
    </header>
    <div class="c-body">
      <main class="c-main">
        <div class="container-fluid">
          @yield('content')
        </div>
      </main>
    </div>
    <footer class="c-footer">
      <div><a href="#">School Admin</a> &copy; 2025.</div>
    </footer>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@5.4.1/dist/js/coreui.bundle.min.js" integrity="sha384-A/PJYVqbBIxVQjEeGNq+sol2Ti2m1CIs9UqTU4QAPHMm+4V/Qzov2cZYatOxoVgf" crossorigin="anonymous"></script>
</body>
</html>