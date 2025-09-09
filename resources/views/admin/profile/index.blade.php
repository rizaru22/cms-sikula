@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="card-header">Profil Sekolah</div>
  <div class="card-body">
    <p><strong>Kata Sambutan:</strong> {{ $profile->welcome_message }}</p>
    <p><strong>Sejarah:</strong> {{ $profile->history }}</p>
    <p><strong>Visi:</strong> {{ $profile->vision }}</p>
    <p><strong>Misi:</strong> {{ $profile->mission }}</p>
    <p><strong>Program Studi:</strong> {{ implode(', ', json_decode($profile->study_programs)) }}</p>
    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profil</a>
  </div>
</div>
@endsection