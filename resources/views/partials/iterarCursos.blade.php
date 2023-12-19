@php
$currentYear = null;
@endphp

@foreach ($simaMedias as $simaMedia)
@php
$mediaYear = \Carbon\Carbon::parse($simaMedia->date)->year;
@endphp

@if ($mediaYear != $currentYear)
{{-- Cambio de año, muestra un nuevo encabezado --}}
<h3 class="blog__list-title">{{ $mediaYear }}</h3>
@php
$currentYear = $mediaYear;
@endphp
@endif

<div class="card--blog-alt card---blog mb-4">
    <div class="card--blog-alt__img">
        <img src="{{ asset('/uploads/' . ltrim($simaMedia->image, '/')) }}" alt="{{ $simaMedia->alt_text }}">
    </div>
    <div class="card--blog-alt__text card--blog__text">
        <h4 class="card--title w-100 text-left">{{ $simaMedia->title }}</h4>
        <!-- <p class="card--text w-100 text-left">{{ $simaMedia->short_description }}</p> -->
        <a class="txt--blue" href="{{ route('showSimaMedia', ['id' => $simaMedia->id]) }}">
            @lang('locale.verNoticiaComp') </a>
    </div>
</div>
@endforeach