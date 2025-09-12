@extends('layouts.app')
@section('title', 'Carousel')
@section('page_title', 'Carousel')
@section('content')

    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="text-right mb-3">
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i>
                    <b>Carousel</b></button>
            </div>
            <div class="row">

                @foreach ($carousels as $carousel)
                    <div class="col-12 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-body pt-2">
                                <img src="{{ asset('storage/' . $carousel->image) }}"
                                    alt="image-carousel-{{ $carousel->updated_at }}" class="d-block w-100" style="height: 400px; object-fit: cover">
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <form action="{{ route('admin.carousel.destroy', $carousel->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm bg-danger"
                                            onclick="return confirm('Yakin ingin menghapus carousel ini?')"><i
                                                class="fas fa-trash"></i></button>
                                    </form>

                                    <form action="#" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="checkbox" name="status" id="status"
                                            {{ $carousel->status == 'active' ? 'checked' : '' }} data-id="{{ $carousel->id }}"
                                            data-bootstrap-switch data-off-color="warning" data-on-color="success">
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                <div class="d-flex justify-content-center">
                    {{ $carousels->links() }}
                </div>
            </nav>
        </div>
        <!-- /.card-footer -->
    </div>

    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                       
                        
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                     
                    @endif
                    <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">Pilih Foto Carousel</label>

                            <input type="file" id="image" class="form-control-file" name="image" accept="image/*"
                                required />

                            @error('image')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

 
@endsection
@section('scripts')
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script>
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        // Listen to switch change
        $('input[data-bootstrap-switch]').on('switchChange.bootstrapSwitch', function(event, state) {
            var id = $(this).data('id');
            var status = state ? 'active' : 'inactive';
            $.ajax({
                url: '/admin/carousel/' + id, // Sesuaikan dengan route update Anda
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT',
                    status: status
                },
                success: function(response) {
                    // Optional: tampilkan notifikasi sukses
                    console.log('Status updated successfully');
                },
                error: function(xhr) {
                    alert('Gagal update status!');
                    console.log(xhr.responseText);
                }
            });
        });
    </script>

       @if ($errors->any())
                       {{-- script untuk auto buka modal kalau ada error --}}
                        <script>
                            $(document).ready(function() {
                                $('#modal-default').modal('show');
                            });
                        </script>
                        

                     
                    @endif
@endsection
