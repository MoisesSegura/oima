@include('widgets.header')
@include('widgets.navbar')
            <div class="content">
                
                <div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link " href="{{ route('eventos')}}">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{ route('noticias')}}">Noticias OIMA</a>
                        </li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('sima-media')}}">SIMA en los medios</a>
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

                        @foreach ($simaMedias as $simaMedia)
                        @php
                        $mediaYear = \Carbon\Carbon::parse($simaMedia->date)->year;
                        @endphp

                        @if ($mediaYear != $currentYear)
                        {{-- Cambio de año, muestra un nuevo encabezado --}}
                        <h3 class="blog__list-title">{{ $mediaYear }}</h3>
                        @php
                        $currentYear = $mediaYear;
                        @endphp
                        @endif

                        <div class="card--blog-alt card---blog mb-4">
                            <div class="card--blog-alt__img">
                                <img src="{{ asset($simaMedia->image) }}" alt="{{ $simaMedia->alt_text }}">
                            </div>
                            <div class="card--blog-alt__text card--blog__text">
                                <h4 class="card--title w-100 text-left">{{ $simaMedia->title }}</h4>
                                <!-- <p class="card--text w-100 text-left">{{ $simaMedia->short_description }}</p> -->
                                <a class="txt--blue" href="{{ route('showSimaMedia', ['id' => $simaMedia->id]) }}">Ver
                                    noticia completa</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="text-center mb-5">
                    </div>
                </div>


            </div>


            <footer>
                <div>
                    <a class="logo">OIMA/MIOA</a>
                    <img class="d-none d-md-block" src="../../img/map-white.png" width="100" />
                </div>
                <div class="d-none d-md-block">
                    <p><strong>Explora</strong></p>
                    <ul class="footer__list footer__links ">
                        <li><a href="../index.html">Inicio</a></li>
                        <li><a href="../repositorio.html">Repositorio</a></li>
                        <li><a href="eventos.html">Blog</a></li>
                        <li><a href="../oima.html">OIMA</a></li>
                        <li><a href="../catalogo/Frutas.html">Catálogo</a></li>
                        <li><a href="../contacto.html">Contacto</a></li>
                    </ul>
                </div>
                <hr class="d-md-none">
                <div>
                    <p><strong>Contáctanos</strong></p>
                    <ul class="footer__list">
                        <!-- <li><a href="tel:+50622160232"><i class="mdi mdi-phone"></i> +(506) 2216 0232</a></li> -->
                        <li><a href="mailto:oima@iica.int"><i class="mdi mdi-email"></i> oima@iica.int</a></li>
                    </ul>
                </div>
            </footer>
            <script type="text/javascript" src="../../js/main.js"></script>
            <script>
                var is_ajax = false;
                var page = 2;
                var query = "";
                query = query.replace(/&amp;/g, '&');

                var cantPages = 1;

                $("#more-results").on('click', function () {
                    if (currentYear === undefined) {
                        currentYear = 0;
                    }
                    if (is_ajax === false) {
                        is_ajax = true;
                        $.ajax({
                            url: "/es/ajax/blog/sima-media/" + currentYear + "/" + page + "?" + query,
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

            <!-- Mirrored from www.mioa.org/es/blog/sima-media by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Oct 2023 23:24:30 GMT -->

            </html>