
@foreach ($presentations as $presentation)
    <div class="card--repository">
        <img src="{{ asset('/uploads/' . ltrim($presentation->image, '/')) }}" alt="{{ $presentation->title }}" class="card__img">
        <div class="card--content">
            <h4 class="card--title">{{ __($presentation->title) }}</h4>
            <hr>
            <p class="card--text">{{ $presentation->author }}</p>
            <a class="btn btn--green btn--small" href="{{ asset('/uploads/' . ltrim($presentation->file_real, '/')) }}" target="_blank">@lang('locale.ver')</a>
            <a class="btn btn--white-blue btn--small" href="{{ asset('/uploads/' . ltrim($presentation->file_real, '/')) }}" download="{{ $presentation->file_real_name }}" target="_blank">
                <i class="mdi mdi-download"></i>
            </a>
        </div>
    </div>
@endforeach
