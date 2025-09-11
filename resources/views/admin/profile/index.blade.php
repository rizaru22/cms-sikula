@extends('layouts.app')
@section('title', 'Profil Sekolah')
@section('page_title', 'Profil Sekolah')
@section('content')
<div class="card">
  <div class="card-header">Profil Sekolah</div>
  <div class="card-body">
    <p><strong>Kata Sambutan:</strong> {{ $profile->welcome_message }}</p>
    <p><strong>Sejarah:</strong> {{ $profile->history }}</p>
    <p><strong>Visi:</strong> {{ $profile->vision }}</p>
    <p><strong>Misi:</strong> {{ $profile->mission }}</p>
    <a href="{{ route('admin.profile.edit',$profile->id) }}" class="btn btn-primary">Edit Profil</a>
  </div>
</div>
@endsection

