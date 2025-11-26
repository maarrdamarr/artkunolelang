@php
    $logoSection = \App\Models\LandingSection::where('key', 'logo')->where('published', true)->first();
@endphp

@if($logoSection && $logoSection->image)
    @php
        $logoUrl = \Illuminate\Support\Str::startsWith($logoSection->image, ['http://','https://'])
            ? $logoSection->image
            : asset('storage/' . $logoSection->image);
    @endphp
    <img src="{{ $logoUrl }}" alt="ARTKUNO Logo" {{ $attributes }}>
@else
    <span {{ $attributes }}>
        ARTKUNO
    </span>
@endif
