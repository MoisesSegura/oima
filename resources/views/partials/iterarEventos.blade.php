@php
$currentYear = null;
@endphp

@foreach ($events as $event)
@php
$eventYear = $event->year;
@endphp

@if ($eventYear != $currentYear)

<h3 class="blog__list-title">{{ $eventYear }}</h3>
@php
$currentYear = $eventYear;
@endphp
@endif

<div class="card--event card--blog mb-4">
    <div class="card--event__img">
        <img src="{{ asset('/uploads/' . ltrim($event->image, '/')) }}" alt="{{ $event->name }}">
    </div>
    <div class="card--blog__text">
        <h4 class="card--title w-100 text-left">{{ __($event->name) }}</h4>
        <p class="card--subtitle w-100 text-left">{{
            \Carbon\Carbon::parse($event->start)->isoFormat('D [-] MMMM') }}</p>

        <a class="btn btn--green" href="{{ route('showEvent', ['id' => $event->id]) }}">
            @lang('locale.verEvento') </a>
    </div>
</div>
@endforeach