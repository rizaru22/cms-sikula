@extends('layouts.app')

@section('title','Ganti Password')
@section('page_title','Ganti Password')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card ">
            <div class="card-header bg-brand text-white">
                <h3 class="card-title">Ubah Password</h3>
            </div>

            <form method="POST" action="{{ route('admin.password.update') }}">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password"
                               name="current_password"
                               class="form-control @error('current_password') is-invalid @enderror"
                               required>

                        @error('current_password')
                            <span class="invalid-feedback d-block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               required>

                        @error('password')
                            <span class="invalid-feedback d-block">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password"
                               name="password_confirmation"
                               class="form-control"
                               required>
                    </div>

                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i>
                        Update Password
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection