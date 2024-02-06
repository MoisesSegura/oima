@include('widgets.header')
@include('widgets.navbar')



<div class="content">


    <section class="section--about">
        <div id="Quienes-somos"></div>

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
                <div class="who">
                    <div class="container-who">
                        @foreach($person as $individual)
                        @if($individual->category_id == 1)
                        <div class="wrapper-who">
                            <div class="card-who">
                                <div class="profile-img">
                                    @if($individual->photo)
                                    <img src="{{ asset('/uploads/' . $individual->photo) }}" alt="$individual->name">
                                    @endif
                                </div>
                                <div class="content-who">
                                    <h3>{{ $individual->name }}</h3>
                                    <p>{{ strip_tags($individual->description) }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="category-3" role="tabpanel" aria-labelledby="category-3-tab">
                <div class="who">
                    <div class="container-who">
                        @foreach($person as $individual)
                        @if($individual->category_id == 3)
                        <div class="wrapper-who">
                            <div class="card-who">
                                <div class="profile-img">
                                    @if($individual->photo)
                                    <img src="{{ asset('/uploads/' . $individual->photo) }}">
                                    @endif
                                </div>
                                <div class="content-who">
                                    <h3>{{ $individual->name }}</h3>
                                    <p>{{ strip_tags($individual->description) }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="category-4" role="tabpanel" aria-labelledby="category-4-tab">
                <div class="who">
                    <div class="container-who">
                        @foreach($person as $individual)
                        @if($individual->category_id == 4)
                        <div class="wrapper-who">
                            <div class="card-who">
                                <div class="profile-img">
                                    @if($individual->photo)
                                    <img src="{{ asset('/uploads/' . $individual->photo) }}">
                                    @endif
                                </div>
                                <div class="content-who">
                                    <h3>{{ $individual->name }}</h3>
                                    <p>{{ strip_tags($individual->description) }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div id="Miembros"></div>
            </div>

    </section>




    <section>
        <div class="countries">
            <div class="country--filters">
                <h5><span class="number">{{ $countries->count() }}</span><span
                        class="title__text">@lang('locale.paisesMiembros')<small
                            style="color: black;">@lang('locale.enAmerica')</small></span>
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
        <div id="Logros"></div>
    </section>


    <section class="about__achievements">
        <div class="card--achievements card--achievements-internal card--expansible">
            <img src="../img/achievements-icon.svg" alt="" class="d-none d-md-block">
            <h4 class="title">@lang('locale.logros')</h4>
            <ul class="list--achievements card__list list--circle bullets--blue">
                @foreach ($achievement as $achievement)
                <li class="list--expandable">{!! $achievement->text !!}</li>
                @endforeach


            </ul>
        </div>
    </section>




    <section class="about__comitee">
        @foreach ($executivecommitee as $exec)
        <img src="{{ asset('/uploads/' . ltrim($exec->image, '/')) }}">
        @endforeach
        <div>
            <div class="card--comitee">
                <h4 class="title">@lang('locale.comiteEjecutivo')</h4>
                <div class="txt--black">
                    @foreach ($executivecommitee as $executivecommitee)
                    {!! $executivecommitee->description !!}
                    @endforeach
                </div>
            </div>
            <div class="card--history">
                <h4 class="title">@lang('locale.historia')</h4>
                <div class="txt--black">
                    <p> {!! $oima->description !!} </p>
                    <a class="btn btn--green" href="{{ route('historia') }}">@lang('locale.verHistoria')</a>
                </div>
            </div>
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