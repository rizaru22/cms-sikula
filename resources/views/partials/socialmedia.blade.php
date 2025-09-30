@php
    $socials = [
        'facebook' => 'bi-facebook',
        'instagram' => 'bi-instagram',
        'threads' => 'bi-threads',
        'x' => 'bi-twitter-x',
        'youtube' => 'bi-youtube',
    ];
@endphp

@foreach ($socials as $field => $icon)
    @if (!empty($profile->$field))
        <a href="{{ $profile->$field }}" target="_blank" rel="noopener noreferrer" class="me-2">
            <i class="bi {{ $icon }}"></i>
        </a>
    @endif
@endforeach
