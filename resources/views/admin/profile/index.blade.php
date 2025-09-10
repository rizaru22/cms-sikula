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

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          Start creating your amazing application!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>