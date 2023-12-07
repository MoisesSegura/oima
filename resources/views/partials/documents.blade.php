@foreach ($documents as $document)
<div class="card--repository">
    <div class="card--content">
        <h4 class="card--title"> {{ __($document->title) }} </h4>
        <hr>
        <p class="card--text"> {{ $document->author }} </p>
        <p class="card--text">{{ $document->place }}</p>
        <a class="btn btn--green btn--small" href="{{ asset('/uploads/' . ltrim($document->file_real, '/')) }}" target="_blank">@lang('locale.ver')</a>
        <a class="btn btn--white-blue btn--small" href="{{ asset('/uploads/' . ltrim($document->file_real, '/')) }}"
            download="{{ $document->file_real_name }}" target="_blank"><i class="mdi mdi-download"></i></a>
    </div>
</div>
@endforeach