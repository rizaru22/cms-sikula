@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

    <script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 250,
        placeholder: 'Tulis konten disini...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onPaste: function (e) {
                e.preventDefault();

                let clipboardData = (e.originalEvent || e).clipboardData;
                let text = clipboardData.getData('text/plain');

                document.execCommand('insertText', false, text);
            },

            onImageUpload: function(files) {
                let data = new FormData();
                data.append('image', files[0]);
                data.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: '{{ route('admin.summernote.upload') }}',
                    method: 'POST',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(url) {
                        $('.summernote').summernote('insertImage', url);
                    },
                    error: function() {
                        alert('Gagal mengunggah gambar');
                    }
                });
            }
        }
    });
});
</script>

@endpush
<textarea name="{{ $name }}" id="{{$name}}" class="summernote form-control">{{ $slot }}</textarea>