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
                        <img class="w-100 d-none d-md-block"
                            src="{{ asset($oima->image) }}">
                    </div>
                  
                    <div class="col-md-6 about__values values--desktop d-none d-md-block">
                        <h3 class="title">Nuestros Principios</h3>
                        <ul class="list--icons">
                            @foreach ($workprinciple as $workprinciple)

                            <li>
                                <img class="icon"
                                    src="{{ asset($workprinciple->image) }}">
                                <p  class="txt--black">{{ __($workprinciple->text) }}</p>
                            </li>
                          
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
            </div>

        </section>

        <section class="blog--home">

            <div class="blog__tabs">
                <h3 class="title">¿Quiénes somos?</h3>
                <hr class="w-50 mx-auto">
                <ul class="nav nav-tabs" id="carousel-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#category-1" id="category-1-tab" data-toggle="tab" role="tab"
                            aria-controls="#category-1" aria-selected="true">Comité Ejecutivo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#category-2" id="category-2-tab" data-toggle="tab" role="tab"
                            aria-controls="#category-2" aria-selected="true">Delegados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#category-3" id="category-3-tab" data-toggle="tab" role="tab"
                            aria-controls="#category-3" aria-selected="true">Secretaría Técnica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#category-4" id="category-4-tab" data-toggle="tab" role="tab"
                            aria-controls="#category-4" aria-selected="true">Premio al Servicio Distinguido</a>
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

        <!-- <section>
            <div class="countries">
                <div class="country--filters">
                    <h5><span class="number">35</span><span class="title__text">Países miembros <small>a lo largo de
                                América</small></span> </h5>
                    <div class="country--filters__nav-container d-none d-md-block">
                        <ul class="country--filters__nav">
                            <li><a class="active" href="#" data-filter="none">Todos</a></li>
                            <li><a href="#" data-filter="region-1">Región Central</a></li>
                            <li><a href="#" data-filter="region-2">Región Norte</a></li>
                            <li><a href="#" data-filter="region-5">Región Cono Sur</a></li>
                            <li><a href="#" data-filter="region-6">Región Caribe</a></li>
                            <li><a href="#" data-filter="region-7">Región Andina</a></li>
                        </ul>
                    </div>
                    <div class="text-center d-md-none">
                        <a href="oima/countries.html">Ver todos</a>
                    </div>
                </div>
                <div class="countries--container d-none d-md-block">
                    <ul>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/antigua-and-barbuda.html"><span
                                    class="flag flag--ag"></span><span>Antigua y Barbuda</span></a>
                        </li>
                        <li class="region-5">
                            <a class="country--link text-center" href="oima/organizacion/argentina.html"><span
                                    class="flag flag--ar"></span><span>Argentina</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/bahamas.html"><span
                                    class="flag flag--bs"></span><span>Bahamas</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/barbados.html"><span
                                    class="flag flag--bb"></span><span>Barbados</span></a>
                        </li>
                        <li class="region-1">
                            <a class="country--link text-center" href="oima/organizacion/belize.html"><span
                                    class="flag flag--bz"></span><span>Belice</span></a>
                        </li>
                        <li class="region-7">
                            <a class="country--link text-center" href="oima/organizacion/bolivia.html"><span
                                    class="flag flag--bo"></span><span>Bolivia</span></a>
                        </li>
                        <li class="region-5">
                            <a class="country--link text-center" href="oima/organizacion/brasil.html"><span
                                    class="flag flag--br"></span><span>Brasil</span></a>
                        </li>
                        <li class="region-2">
                            <a class="country--link text-center" href="oima/organizacion/canadaa.html"><span
                                    class="flag flag--ca"></span><span>Canadá</span></a>
                        </li>
                        <li class="region-5">
                            <a class="country--link text-center" href="oima/organizacion/chile.html"><span
                                    class="flag flag--cl"></span><span>Chile</span></a>
                        </li>
                        <li class="region-7">
                            <a class="country--link text-center" href="oima/organizacion/colombia.html"><span
                                    class="flag flag--co"></span><span>Colombia</span></a>
                        </li>
                        <li class="region-1">
                            <a class="country--link text-center" href="oima/organizacion/costa-rica.html"><span
                                    class="flag flag--cr"></span><span>Costa Rica</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/dominica.html"><span
                                    class="flag flag--dm"></span><span>Dominica</span></a>
                        </li>
                        <li class="region-7">
                            <a class="country--link text-center" href="oima/organizacion/ecuador.html"><span
                                    class="flag flag--ec"></span><span>Ecuador</span></a>
                        </li>
                        <li class="region-1">
                            <a class="country--link text-center" href="oima/organizacion/el-salvador.html"><span
                                    class="flag flag--sv"></span><span>El Salvador</span></a>
                        </li>
                        <li class="region-2">
                            <a class="country--link text-center" href="oima/organizacion/estados-unidos.html"><span
                                    class="flag flag--us"></span><span>Estados Unidos</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/granada.html"><span
                                    class="flag flag--gd"></span><span>Granada</span></a>
                        </li>
                        <li class="region-1">
                            <a class="country--link text-center" href="oima/organizacion/guatemala.html"><span
                                    class="flag flag--gt"></span><span>Guatemala</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/guyana.html"><span
                                    class="flag flag--gy"></span><span>Guyana</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/haiti.html"><span
                                    class="flag flag--ht"></span><span>Haití</span></a>
                        </li>
                        <li class="region-1">
                            <a class="country--link text-center" href="oima/organizacion/honduras.html"><span
                                    class="flag flag--hn"></span><span>Honduras</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/jamaica.html"><span
                                    class="flag flag--jm"></span><span>Jamaica</span></a>
                        </li>
                        <li class="region-2">
                            <a class="country--link text-center" href="oima/organizacion/maaxico.html"><span
                                    class="flag flag--mx"></span><span>México</span></a>
                        </li>
                        <li class="region-1">
                            <a class="country--link text-center" href="oima/organizacion/nicaragua.html"><span
                                    class="flag flag--ni"></span><span>Nicaragua</span></a>
                        </li>
                        <li class="region-1">
                            <a class="country--link text-center" href="oima/organizacion/panamaa.html"><span
                                    class="flag flag--pa"></span><span>Panamá</span></a>
                        </li>
                        <li class="region-5">
                            <a class="country--link text-center" href="oima/organizacion/paraguay.html"><span
                                    class="flag flag--py"></span><span>Paraguay</span></a>
                        </li>
                        <li class="region-7">
                            <a class="country--link text-center" href="oima/organizacion/peraa.html"><span
                                    class="flag flag--pe"></span><span>Perú</span></a>
                        </li>
                        <li class="region-1">
                            <a class="country--link text-center"
                                href="oima/organizacion/repaablica-dominicana.html"><span
                                    class="flag flag--do"></span><span>República Dominicana</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center"
                                href="oima/organizacion/san-cristaabal-y-las-nieves.html"><span
                                    class="flag flag--kn"></span><span>San Cristóbal y Nieves</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center"
                                href="oima/organizacion/san-vicente-y-granadinas.html"><span
                                    class="flag flag--vc"></span><span>San Vicente y las Granadinas</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/santa-lucaaa.html"><span
                                    class="flag flag--lc"></span><span>Santa Lucía</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/suriname.html"><span
                                    class="flag flag--sr"></span><span>Surinám</span></a>
                        </li>
                        <li class="region-6">
                            <a class="country--link text-center" href="oima/organizacion/trinidad---tobago.html"><span
                                    class="flag flag--tt"></span><span>Trinidad y Tobago</span></a>
                        </li>
                        <li class="region-5">
                            <a class="country--link text-center" href="oima/organizacion/uruguay.html"><span
                                    class="flag flag--uy"></span><span>Uruguay</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section> -->

  


        <section>
            <div class="countries">
                <div class="country--filters">
                    <h5><span class="number">{{ $countries->count() }}</span><span class="title__text">Países miembros <small>a lo largo de América</small></span> </h5>
                    <div class="country--filters__nav-container d-none d-md-block">
                        <ul class="country--filters__nav">
                            <li><a class="active" href="#" data-filter="none">Todos</a></li>
                                                            <li><a href="#" data-filter="region-1">Región Central</a></li>
                                                            <li><a href="#" data-filter="region-2">Región Norte</a></li>
                                                            <li><a href="#" data-filter="region-5">Región Cono Sur</a></li>
                                                            <li><a href="#" data-filter="region-6">Región Caribe</a></li>
                                                            <li><a href="#" data-filter="region-7">Región Andina</a></li>
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
                <a class="country--link text-center" href="{{ route('verOrganizacion', ['id' => $organization->id]) }}">
                    <span class="flag flag--{{ strtolower($country->flag->iso) }}"></span>
                    <span>{{ $country->name }}</span>
                </a>
            </li>
        @endforeach
    @else
        <li class="region-{{ $country->region->id }}">
            <span class="flag flag--{{ strtolower($country->flag->iso) }}"></span>
            <span>{{ $country->name }}</span>
            <!-- Puedes manejar el caso en el que no hay organizaciones asociadas si es necesario -->
        </li>
    @endif
@endforeach
            </ul>
        </div>
            </div>
        </section>





        <section class="about__mission">
            <div class="card--mission">
                <div class="d-none d-md-block">
                    <img src="../img/target.png" alt="">
                </div>
                <div class="card--mission_text">
                    <h3 class="title txt-underline my-3">Misión</h3>
                    <p class="txt--black text-justify my-1">

                        {!! __($oima->mision) !!}

                    </p>
                </div>
                <div class="card--mission_text">
                    <h3 class="title txt-underline my-3">Visión</h3>
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
                    <h4 class="title">Comité Ejecutivo</h4>
                    <div class="txt--black">
                        @foreach ($executivecommitee as $executivecommitee)
                        {{ __($executivecommitee->description) }}
                        @endforeach
                    </div>
                </div>
                <div class="card--history">
                    <h4 class="title">Historia de OIMA</h4>
                    <div class="txt--black">
                        <p> {!! __($oima->description) !!} </p>
                        <a class="btn btn--green" href="{{ route('historia') }}">Ver historia completa</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="about__achievements">
            <div class="card--achievements card--achievements-internal card--expansible">
                <img src="../img/achievements-icon.svg" alt="" class="d-none d-md-block">
                <h4 class="title">Nuestros Logros</h4>
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
                <h4 class="title">¿Más información?</h4>
                <p class="txt--black"></p>
                <a class="btn btn--green" href="{{ route('contacto') }}">Contactar a OIMA</a>
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