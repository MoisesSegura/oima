@foreach ($reports as $report)
<div class="card--repository">
    @if($report->image) <img src="{{ asset('/uploads/' . ltrim($report->image, '/')) }}" alt="" class="card__img"> @endif
    <div class="card--content">
        <h4 class="card--title"> {{ __($report->title) }} </h4>
        <hr>
        <p class="card--text">{{ $report->author }}</p>
        <p class="card--text"> {{ $report->place }} </p>
        <a class="btn btn--green btn--small" href="{{ asset('/uploads/' . ltrim($report->file_real, '/')) }}" target="_blank">@lang('locale.ver')</a>
        <a class="btn btn--white-blue btn--small" href="{{ asset('/uploads/' . ltrim($report->file_real, '/')) }}"
            download="{{ $report->file_real_name }}" target="_blank"><i class="mdi mdi-download"></i></a>
    </div>
</div>
@endforeach