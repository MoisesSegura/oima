@foreach ($videos as $video)
<a data-video="{{ $video->url }}" class="card--video text-left" data-toggle="modal" href="#videoModalCenter">
    <figure>
        <img src="https://i3.ytimg.com/vi/{{ $video->url }}/maxresdefault.jpg" alt="">
    </figure>
    <h4 class="card--title title--sideline">
        {{ __($video->name) }}
    </h4>
    <p class="card--text">
        {{ __($video->description) }}
    </p>
    <p class="txt--blue">@lang('locale.ver')</p>
</a>
@endforeach