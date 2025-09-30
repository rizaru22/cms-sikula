@extends('layouts.app')
@section('title', 'Profil Sekolah')
@section('page_title', 'Profil Sekolah')
@push('styles')
    <!-- Bootstrap Icons -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
      rel="stylesheet"
    />
@endpush
@section('content')

            <!-- Profile Image -->
            <div class="card card-teal card-outline ml-3 mr-3">

              <div class="card-body box-profile">
                <div class="text-right">
                  <a href="{{ route('admin.profile.edit', $profile->id) }}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> <b>Edit Profil</b></a>
                </div>
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/'.$profile->logo)}}" alt="{{ $profile->name }} Logo">
                </div>


                <h3 class="profile-username text-center">{{$profile->name}}</h3>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Nama Sekolah</strong>
                <p class="text-muted">
                  {{$profile->name}} <br> {{$profile->short_name}}
                </p>
                <hr>
                <strong><i class="fas fa-phone mr-1"></i> Telepon</strong>
                <p class="text-muted">{{$profile->phone}}</p>
                <hr>
                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                <p class="text-muted">{{$profile->email}}</p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                <p class="text-muted">{{$profile->address}}</p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Ucapan Selamat Datang</strong>
                <p class="text-muted">{!!$profile->welcome_message!!}</p>
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> Sejarah</strong>
                <p class="text-muted">{!!$profile->history!!}</p>
                <hr>
                <strong><i class="fas fa-eye mr-1"></i> Visi</strong>
                <p class="text-muted">{!!$profile->vision!!}</p>
                <hr>
                <strong><i class="fas fa-bullseye mr-1"></i> Misi</strong>
                <p class="text-muted">{!!$profile->mission!!}</p>
                <hr>
                <strong><i class="fab fa-facebook"></i> Facebook</strong>
                <p class="text-muted">{{$profile->facebook}}</p>
                <hr>
                <strong><i class="fab fa-instagram-square"></i> Instagram</strong>
                <p class="text-muted">{{$profile->instagram}}</p>
                <hr>
                <strong><i class="fab fa-youtube"></i> Youtube</strong>
                <p class="text-muted">{{$profile->youtube}}</p>
                <hr>
                <strong><i class="bi bi-threads"></i> Thread</strong>
                <p class="text-muted">{{$profile->thread}}</p>
                <hr>
                <strong><i class="bi bi-twitter-x"></i> Twitter</strong>
                <p class="text-muted">{{$profile->twitter}}</p>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                
            </div>
            <!-- /.card -->

           
@endsection

