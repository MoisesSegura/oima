@foreach ($publications as $publication)
<div class="card--repository">
    <img src="{{ asset(trim('/uploads/' . $publication->image, '/')) }}" alt="{{ $publication->title }}"
        class="card__img">
    <div class="card--content">
        <h4 class="card--title">{{ __($publication->title) }}</h4>
        <hr>
        <p class="card--text"></p>
        <p class="card--text"></p>
        <a class="btn-transform"
            href="{{ route('verPublicacion', ['id' => $publication->id]) }}">@lang('locale.verinfo')</a>
        <a class="btn btn--white-blue btn--small" href="{{ $publication->file_real }}"
            download="{{ $publication->file_real_name }}" target="_blank"><i class="mdi mdi-download"></i></a>
    </div>
</div>
@endforeach

@foreach ($documents as $document)
<div class="card--repository">
    <div class="card--content">
        <h4 class="card--title"> {{ __($document->title) }} </h4>
        <hr>
        <p class="card--text"> {{ $document->author }} </p>
        <p class="card--text">{{ $document->place }}</p>
        <a class="btn btn--green btn--small" href="{{ asset('/uploads/' . ltrim($document->file_real, '/')) }}"
            target="_blank">@lang('locale.ver')</a>
        <a class="btn btn--white-blue btn--small" href="{{ asset('/uploads/' . ltrim($document->file_real, '/')) }}"
            download="{{ $document->file_real_name }}" target="_blank"><i class="mdi mdi-download"></i></a>
    </div>
</div>
@endforeach

          
