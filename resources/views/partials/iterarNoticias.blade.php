@php
$currentYear = null;
@endphp

@foreach ($news as $new)
@php
$newYear = \Carbon\Carbon::parse($new->date)->year;
@endphp

@if ($newYear != $currentYear)
{{-- Cambio de año, muestra un nuevo encabezado --}}
<h3 class="blog__list-title">{{ $newYear }}</h3>
@php
$currentYear = $newYear;
@endphp
@endif

<div class="card--event card--blog mb-4">
    <div class="card--event__img">
        <img src="{{ asset('/uploads/' . ltrim($new->image, '/')) }}" alt="{{ $new->name }}">
    </div>
    <div class="card--blog__text">
        <h4 class="card--title w-100 text-left">{{ __($new->title) }}</h4>
        <p class="card--subtitle w-100 text-left">{{
            \Carbon\Carbon::parse($new->date)->isoFormat('D [-] MMMM YYYY') }}</p>

        <a class="btn btn--green" href="{{ route('showNew', ['id' => $new->id]) }}">@lang('locale.verNoticia')</a>
    </div>
</div>
@endforeach