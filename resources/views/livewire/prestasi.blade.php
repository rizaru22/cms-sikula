<div>
    <div class="container py-5 mt-5">

    
    <div class="card shadow-sm border-0">
        <div class="card-body p-4 p-md-5">

            {{-- Meta --}}
            <div class="mb-3">
                <span class="badge bg-success me-2">
                    <i class="bi bi-calendar-event"></i>
                    {{ tglIndo($achievement->date) }}
                </span>

                <span class="badge bg-warning text-dark">
                    <i class="bi bi-award"></i>
                    {{ $achievement->category_achievement->name }}
                </span>
            </div>

            {{-- Title --}}
            <h1 class="fw-bold mb-4">
                {{ $achievement->title }}
            </h1>

            {{-- Image --}}
            @if($achievement->image)
                <div class="mb-4 text-center">
                    <img 
                        src="{{ asset('storage/' . $achievement->image) }}"
                        alt="{{ $achievement->title }}"
                        class="img-fluid rounded shadow-sm"
                    >
                </div>
            @endif

            {{-- Rich Text --}}
            <div class="achievement-content">
                {!! $achievement->description !!}
            </div>

            {{-- Back --}}
            <div class="mt-5 text-end">
                <a href="{{ route('achievement.list') }}" 
                   class="btn btn-outline-success">
                   <i class="bi bi-arrow-left"></i>
                   Kembali ke Daftar Prestasi
                </a>
            </div>

        </div>
    </div>

</div>
</div>
