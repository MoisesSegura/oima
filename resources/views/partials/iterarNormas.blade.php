@foreach ($norms as $norm)
<div class="card--repository">
    <div class="card--content">
        <h4 class="card--title">{{ __($norm->name) }}</h4>
        <hr>
        <a class="btn btn--small btn--green" href="{{ __($norm->file_real) }}" target="_blank">@lang('locale.ver')</a>
        <a class="btn btn--small btn--white-blue" href="{{ __($norm->file_real) }}"
            download="{{ __($norm->file_real_name) }}" target="_blank"><i class="mdi mdi-download"></i></a>
    </div>
</div>
@endforeach