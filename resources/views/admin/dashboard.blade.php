@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-header bg-primary text-white">Dashboard Admin</div>
      <div class="card-body">
        <h5>Selamat datang di Panel Admin Website Sekolah!</h5>
        <p>Gunakan menu di samping untuk mengelola profil sekolah, berita, dan prestasi.</p>
        <div class="row text-center mt-4">
          <div class="col-md-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h6 class="card-title">Profil Sekolah</h6>
                <a href="{{ route('admin.profile.index') }}" class="btn btn-success btn-sm">Kelola Profil</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h6 class="card-title">Berita</h6>
                <a href="{{ route('admin.news.index') }}" class="btn btn-warning btn-sm">Kelola Berita</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <h6 class="card-title">Prestasi</h6>
                <a href="{{ route('admin.achievement.index') }}" class="btn btn-danger btn-sm">Kelola Prestasi</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
