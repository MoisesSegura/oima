@include('widgets.header')
@include('widgets.navbar')
            <div class="content">

                <div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="{{ route('eventos')}}">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('noticias')}}">Noticias OIMA</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('sima-media')}}">SIMA en los medios</a>
                        </li>
                    </ul>
                </div>

                <form method="get">
                    <div class="search--container">
                        <div class="selectors__container">
                            <div class="selectors">
                                <div class="select--wrapper">
                                    <select class="select" name="year">
                                        <option value="">Todos los años</option>

                                        @for ($year = date('Y'); $year >= 2019; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="input__wrap input__wrap--search">
                            <input type="search" class="input input--search" placeholder="Buscar" name="name" value="">
                        </div>
                    </div>
                </form>


                <div class="my-2">
                    <div class="blog__list" id="blog-entries">

                        @php
                        $currentYear = null;
                        @endphp

                        @foreach ($events as $event)
                        @php
                        $eventYear = \Carbon\Carbon::parse($event->start)->year;
                        @endphp

                        @if ($eventYear != $currentYear)
                        {{-- Cambio de año, muestra un nuevo encabezado --}}
                        <h3 class="blog__list-title">{{ $eventYear }}</h3>
                        @php
                        $currentYear = $eventYear;
                        @endphp
                        @endif

                        <div class="card--event card--blog mb-4">
                            <div class="card--event__img">
                                <img src="{{ asset($event->image) }}" alt="{{ $event->name }}">
                            </div>
                            <div class="card--blog__text">
                                <h4 class="card--title w-100 text-left">{{ __($event->name) }}</h4>
                                <p class="card--subtitle w-100 text-left">{{
                                    \Carbon\Carbon::parse($event->start)->isoFormat('D [-] MMMM') }}</p>
                                <!-- <p class="card--text w-100 text-left">{!! \Illuminate\Support\Str::limit($event->description, 20) !!}</p> -->
                                <a class="btn btn--green" href="{{ route('showEvent', ['id' => $event->id]) }}">Ver
                                    Evento</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="text-center mb-5">
                        <button class="btn btn--green" id="more-results">Cargar más</button>
                    </div>
                </div>


            </div>


            @include('widgets.footer')

            
            <script type="text/javascript" src="../../js/main.js"></script>
            <script>
                var is_ajax = false;
                var page = 2;
                var query = "";
                query = query.replace(/&amp;/g, '&');

                var cantPages = 3;

                $("#more-results").on('click', function () {
                    if (currentYear === undefined) {
                        currentYear = 0;
                    }
                    if (is_ajax === false) {
                        is_ajax = true;
                        $.ajax({
                            url: "/es/ajax/blog/eventos/" + currentYear + "/" + page + "?" + query,
                            method: "GET"
                        }).done(function (data) {
                            is_ajax = false;
                            page++;
                            $("#blog-entries").append(data);

                            if (cantPages < page) {
                                $("#more-results").css("display", "none");
                            }
                        });
                    }
                });

            </script>
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