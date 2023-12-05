@include('widgets.header')
@include('widgets.navbar')


<div class="content">
    <section class="section--about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 about">
                    <h1 class="title title--underline">OIMA/MIOA</h1>
                    <p class="txt--black">


                        @foreach ($oima as $oima)
                        {!! __($oima->description) !!}
                        @endforeach

                    </p>
                    <img class="w-100 d-none d-md-block" src="{{ asset($oima->image) }}">
                </div>

                <div class="col-md-6 about__values values--desktop d-none d-md-block">
                    <h3 class="title">@lang('locale.principios')</h3>
                    <ul class="list--icons">
                        @foreach ($workprinciple as $workprinciple)

                        <li>
                            <img class="icon" src="{{ asset($workprinciple->image) }}">
                            <p class="txt--black">{{ __($workprinciple->text) }}</p>
                        </li>

                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

    </section>

    <section class="blog--home">

        <div class="blog__tabs">
            <h3 class="title">@lang('locale.quienes')</h3>
            <hr class="w-50 mx-auto">
            <ul class="nav nav-tabs" id="carousel-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#category-1" id="category-1-tab" data-toggle="tab" role="tab"
                        aria-controls="#category-1" aria-selected="true">{{$categories[0]->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#category-2" id="category-2-tab" data-toggle="tab" role="tab"
                        aria-controls="#category-2" aria-selected="true">{{$categories[1]->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#category-3" id="category-3-tab" data-toggle="tab" role="tab"
                        aria-controls="#category-3" aria-selected="true">{{$categories[2]->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#category-4" id="category-4-tab" data-toggle="tab" role="tab"
                        aria-controls="#category-4" aria-selected="true">{{$categories[3]->name}}</a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="category-1" role="tabpanel" aria-labelledby="category-1-tab">
                <ul class="blog--carousel">
                    @foreach($person as $individual)
                    @if($individual->category_id == 1)
                    <li class="card--people">
                        <div class="card--content">
                            <h3>{{ $individual->name }}</h3>
                            <p class="txt--black">{{ $individual->title }}</p>
                            <p class="txt--black">{{ $individual->position }}</p>
                            <p class="txt--black">{{ $individual->description }}</p>
                            <p class="txt--black">{{ $individual->infocountry->name }}</p>
                            <p class="txt--green" href="{{ $individual->email }}">{{ $individual->email }}</p>

                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <div class="tab-pane fade" id="category-2" role="tabpanel" aria-labelledby="category-2-tab">
                <ul class="blog--carousel">
                    @foreach($person as $individual)
                    @if($individual->category_id == 2)
                    <li class="card--people">
                        <div class="card--content">
                            <h3>{{ $individual->name }}</h3>
                            <p class="txt--black">{{ $individual->title }}</p>
                            <p class="txt--black">{{ $individual->position }}</p>
                            <p class="txt--black">{{ $individual->description }}</p>
                            <p class="txt--black">{{ $individual->infocountry->name }}</p>
                            <p class="txt--green" href="{{ $individual->email }}">{{ $individual->email }}</p>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <div class="tab-pane fade" id="category-3" role="tabpanel" aria-labelledby="category-3-tab">
                <ul class="blog--carousel">
                    @foreach($person as $individual)
                    @if($individual->category_id == 3)
                    <li class="card--people">
                        <div class="card--content">
                            <h3>{{ $individual->name }}</h3>
                            <p class="txt--black">{{ $individual->title }}</p>
                            <p class="txt--black">{{ $individual->position }}</p>
                            <p class="txt--black">{{ $individual->description }}</p>
                            <p class="txt--black">{{ $individual->infocountry->name }}</p>
                            <p class="txt--green" href="{{ $individual->email }}">{{ $individual->email }}</p>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            <div class="tab-pane fade" id="category-4" role="tabpanel" aria-labelledby="category-4-tab">
                <ul class="blog--carousel">
                    @foreach($person as $individual)
                    @if($individual->category_id == 4)
                    <li class="card--people">
                        <div class="card--content">
                            <h3>{{ $individual->name }}</h3>
                            <p class="txt--black">{{ $individual->title }}</p>
                            <p class="txt--black">{{ $individual->position }}</p>
                            <p class="txt--black">{{ $individual->description }}</p>
                            <p class="txt--black">{{ $individual->infocountry->name }}</p>
                            <p class="txt--green" href="{{ $individual->email }}">{{ $individual->email }}</p>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>

    </section>



    <section>
        <div class="countries">
            <div class="country--filters">
                <h5><span class="number">{{ $countries->count() }}</span><span
                        class="title__text">@lang('locale.paisesMiembros')<small>@lang('locale.enAmerica')</small></span>
                </h5>
                <div class="country--filters__nav-container d-none d-md-block">
                    <ul class="country--filters__nav">
                        <li><a class="active" href="#" data-filter="none">@lang('locale.todos')</a></li>
                        @foreach($regions as $region)
                        <li><a href="#" data-filter="region-{{$region->id}}">{{ $region->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="text-center d-md-none">
                    <a href="/es/oima/countries">Ver todos</a>
                </div>
            </div>
            <div class="countries--container d-none d-md-block">
                <ul>
                    @foreach($countries as $country)
                    @if($country->organizations->isNotEmpty())
                    @foreach($country->organizations as $organization)
                    <li class="region-{{ $country->region->id }}">
                        <a class="country--link text-center"
                            href="{{ route('verOrganizacion', ['id' => $organization->id]) }}">
                            <span class="flag flag--{{ strtolower($country->flag->iso) }}"></span>
                            <span>{{ $country->flag->name }}</span>
                        </a>
                    </li>
                    @endforeach
                    @else
                    <li class="region-{{ $country->region->id }}">
                        <span class="flag flag--{{ strtolower($country->flag->iso) }}"></span>
                        <span>{{ $country->flag->name }}</span>

                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <div id="mision-vision"></div>



    <section class="about__mission">
        <div class="card--mission">
            <div class="d-none d-md-block">
                <img src="../img/target.png" alt="">
            </div>
            <div class="card--mission_text">
                <h3 class="title txt-underline my-3">@lang('locale.mision')</h3>
                <p class="txt--black text-justify my-1">

                    {!! __($oima->mision) !!}

                </p>
            </div>
            <div class="card--mission_text">
                <h3 class="title txt-underline my-3">@lang('locale.vision')</h3>
                <p class="txt--black text-justify my-1">
                    {!! __($oima->vision) !!}
                </p>
            </div>
        </div>
    </section>

    <section class="about__comitee">
        @foreach ($executivecommitee as $exec)
        <img src="{{ asset($exec->image) }}">
        @endforeach
        <div>
            <div class="card--comitee">
                <h4 class="title">@lang('locale.comiteEjecutivo')</h4>
                <div class="txt--black">
                    @foreach ($executivecommitee as $executivecommitee)
                    {{ __($executivecommitee->description) }}
                    @endforeach
                </div>
            </div>
            <div class="card--history">
                <h4 class="title">@lang('locale.historia')</h4>
                <div class="txt--black">
                    <p> {!! __($oima->description) !!} </p>
                    <a class="btn btn--green" href="{{ route('historia') }}">@lang('locale.verHistoria')</a>
                </div>
            </div>
        </div>
    </section>

    <section class="about__achievements">
        <div class="card--achievements card--achievements-internal card--expansible">
            <img src="../img/achievements-icon.svg" alt="" class="d-none d-md-block">
            <h4 class="title">@lang('locale.logros')</h4>
            <ul class="list--achievements card__list list--circle bullets--blue">
                @foreach ($achievement as $achievement)
                <li class="list--expandable">{{ __($achievement->text) }}</li>
                @endforeach


            </ul>
        </div>
    </section>


    <section class="about__more">
        <div class="info--img d-none d-md-block">
            <img src="../img/info-icon.svg">
        </div>
        <div class="more--info">
            <h4 class="title">@lang('locale.masInfo')</h4>
            <p class="txt--black"></p>
            <a class="btn btn--green" href="{{ route('contacto') }}">@lang('locale.contactar')</a>
        </div>
    </section>
</div>


@include('widgets.footer')

<script type="text/javascript" src="../js/main.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-151598454-1');
</script>
</body>

</html>