@include('widgets.header')
@include('widgets.navbar')
<div class="content">
    <div class="d-flex justify-content-between">
        <div class="backbot">
            <a href="/es/catalogo" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Volver</a>
        </div>
        <div class="sharebot ">
            <p class="sharebot--link"><i class="mdi mdi-share-variant"></i> Compartir</p>
            <ul class="share--links">
                <li><a class="share--link" target="_blank"
                        href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/es/producto/Aguacate/costa-rica"><img
                            src="/img/fb-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://wa.me/?text=https://www.mioa.org/es/producto/Aguacate/costa-rica"><img
                            src="/img/wa-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://twitter.com/home?status=https://www.mioa.org/es/producto/Aguacate/costa-rica "><img
                            src="/img/tw-icon.svg"></a></li>
                <li><a class="share--link" target="_blank"
                        href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/es/producto/Aguacate/costa-rica&title=&summary=&source="><img
                            src="/img/li-icon.svg"></a></li>
            </ul>
        </div>
    </div>
    <div class="card card--product">
        <div class="card--product__title d-md-none">

            <p class="card--text">Conocido como</p>
            <h3 class="card--title">{{$product->known_name}}</h3>

        </div>
        <img src="{{ asset($product->product->image) }}" alt="{{ $product->product->name }}" class="card--product__img">
        <div class="card--product__content">
            <div class="px-3 card--product__title d-none d-md-block">

                <p class="card--text">Conocido como</p>
                <h3 class="card--title">{{$product->known_name}}</h3>

            </div>
            <ul class="card__list bullets--gray list--circle">
                <li>
                    <p class="card--title">Otros nombres comunes</p>

                    <p class="card--text">
                        @foreach($knownNames as $knownName)
                        {{ $knownName }}
                        @endforeach
                    </p>


                    <a href="/es/diccionario/Aguacate" class="txt--green">Ver en diccionario <i
                            class="mdi mdi-arrow-right"></i></a>
                </li>
                <li>
                    <p class="card--title">Nombre científico</p>
                    <p class="card--text">{{$product->product->scientific_name}}</p>
                </li>
                <li>
                    <p class="card--title">Familia</p>
                    <p class="card--text">{{$product->product->family_name}}</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="d-md-flex justify-content-md-around align-items-md-end m-1 mt-5 m-md-4">
        <div class="search--container">
            <div class="selectors__container">
                <div class="selectors">
                    <div class="select--wrapper">
                        <select class="select" name="region" id="region-validate">
                            <option value="">Región</option>
                            <option selected value="1">Región Central</option>
                        </select>
                    </div>
                    <div class="select--wrapper">
                        <select class="select selected-country" name="country" id="country">
                            <option value="">País</option>
                            <option selected value="costa-rica">Costa Rica</option>
                            <option value="el-salvador">El Salvador</option>
                            <option value="guatemala">Guatemala</option>
                            <option value="honduras">Honduras</option>
                            <option value="nicaragua">Nicaragua</option>
                            <option value="panamaa">Panamá</option>
                            <option value="repaablica-dominicana">República Dominicana</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="product__content">
        <div class="container">
            <div class="row card--md-only">
                <div class="col-12">
                    <h3 class="title title--sideline title--underline-md">Aspectos de Mercado de Costa Rica</h3>

                    <h3 class="title text-center d-md-none">Tamaño</h3>
                    <p class="txt--small txt--gray text-center d-md-none">(Variedad: Aguacate)</p>

                    <div class="d-md-none">
                        <ul class="nav nav-tabs nav--small" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="transversal-tab" data-toggle="tab"
                                    href="#transversal" role="tab" aria-controls="transversal"
                                    aria-selected="true">Sección Transversal</a></li>
                            <li class="nav-item"><a class="nav-link" id="longitudinal-tab" data-toggle="tab"
                                    href="#longitudinal" role="tab" aria-controls="longitudinal"
                                    aria-selected="false">Sección Longitudinal</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="transversal" role="tabpanel"
                                aria-labelledby="transversal-tab">
                                <table class="table--custom">
                                    <thead>
                                        <tr>
                                            <th>Pequeño</th>
                                            <th>Mediano</th>
                                            <th>Grande</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$product->transversal_section_little}}</td>
                                            <td>{{$product->transversal_section_medium}}</td>
                                            <td>{{$product->transversal_section_big}}</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            <div class="tab-pane fade" id="longitudinal" role="tabpanel"
                                aria-labelledby="longitudinal-tab">
                                <table class="table--custom">
                                    <thead>
                                        <tr>
                                            <th>Pequeño</th>
                                            <th>Mediano</th>
                                            <th>Grande</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$product->longitudinal_section_little}}</td>
                                            <td>{{$product->longitudinal_section_medium}}</td>
                                            <td>{{$product->longitudinal_section_big}}</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="d-none d-md-flex container__size">
                        <figure class="figure">
                            <img src="/img/size-icon.png" class="figure-img img-fluid" alt="icono">
                            <figcaption class="title text-center">Tamaño</figcaption>
                        </figure>
                        <table class="table--sizes">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Pequeño</th>
                                    <th>Mediano</th>
                                    <th>Grande</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sección Transversal</td>
                                    <td>Sin determinar</td>
                                    <td>Sin determinar</td>
                                    <td>Sin determinar</td>
                                </tr>
                                <tr>
                                    <td>Sección Longitudinal</td>
                                    <td>Sin determinar</td>
                                    <td>Sin determinar</td>
                                    <td>Sin determinar</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>

                </div>
                <div class="col-md-6">
                    <div>
                        <h3 class="title text-center">Presentación en el mercado</h3>
                        <div class="card card--centered no-border-md max-w-md-none">
                            <ul class="list__responsive">

                                @foreach ($product->sales as $sale)
                                <li>
                                    <p class="list__responsive--left">{{ __($sale->type) }}</p>
                                    <p class="list__responsive--right">{{ __($sale->unit) }}</p>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <h3 class="title text-center mt-4 mt-md-0">Principales productores y abastecedores</h3>
                        <div class="card card--centered no-border-md">
                            <div class="card--text">
                                <p style="text-align:justify">
                                    {!! $product->principals !!}

                                </p>
                            </div>
                            <ul class="card__list bullets--blue list--arrows">

                                <li>
                                    <p><strong>Exportación</strong></p>
                                    <p class="card--text">
                                        {{ $product->exports }}


                                    </p>
                                </li>

                                <li>
                                    <p><strong>Importación</strong></p>
                                    <p class="card--text">
                                        {{ $product->imports }}


                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="card--md-only">
                        <h3 class="title title--sideline title--underline-md">Datos Índice de Estacionalidad</h3>

                        @if(!empty($graphic))
                        <div class="x-scroll__container">
                            <div class="chart--container">
                                <div id="graphicConti"></div>
                            </div>
                        </div>
                        <p>Fuente: {{$graphic->font}}</p>
                        <p>Años: {{$graphic->font_years}}</p>
                        @else
                        <p>No hay datos disponibles para el gráfico.</p>
                        @endif
                    </div>
                </div>



                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                    crossorigin="anonymous"></script>


                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/series-label.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>


                <script>


                    Highcharts.chart('graphicConti', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: ''
                        },
                        subtitle: {
                            text: ''
                        },
                        xAxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                        },
                        yAxis: {
                            title: {
                                text: ''
                            }
                        },
                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: false
                                },
                                enableMouseTracking: true
                            }

                        },

                        series: [{
                            name: 'Estacionalidad',

                            data: <?= $data ?>
  }]
                    });
                </script>



                <div class="col-md-5">
                    <div class="card--md-only">
                        <h3 class="title title--sideline title--underline-md">
                            {{ $product->ImpRequirement->title }}

                        </h3>

                        <p class="txt--gray"></p>

                        <a href="{{ route('verRequisitos', ['id' => $product->id]) }}"
                            class="card card--link card--centered">
                            <p class="card--text">Ver requisitos</p>
                        </a>
                    </div>
                </div>
                <div class="col-12 d-md-none">
                    <div class="card--md-only">
                        <h3 class="title title--sideline title--underline-md">Galería de fotografías de Costa Rica
                        </h3>

                        <div class="gallery__carousel">
                        </div>

                        <a href="/es/galeria/Aguacate/costa-rica" class="btn btn--green">Ver galería completa</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card--md-only">
                        <h3 class="title title--sideline title--underline-md">Más Información</h3>

                        <a href="{{ route('verInfoAgronomica', ['id' => $product->id]) }}"
                            class="card card--link card--centered">
                            <p class="card--text">Información Agronómica</p>
                        </a>

                        <a href="{{ route('verInfoNutricional', ['id' => $product->id]) }}"
                            class="card card--link card--centered">
                            <p class="card--text">Información Nutricional</p>
                        </a>

                        <a href="{{ route('verGaleria', ['id' => $product->id]) }}"
                            class="card card--link card--centered">
                            <p class="card--text">Ver Galería Fotográfica</p>
                        </a>

                    </div>
                </div>

                <div class="col-md-7">
                    <div class="card--md-only">
                        <h3 class="title title--sideline title--underline-md">Bibliografía</h3>

                        <div class="card card--full-md no-border-md card--centered see-more-container">
                            <div class="card--text see-more-text">
                                <p style="text-align:justify">

                                    {!! __($product->bibliography->text) !!}
                                </p>


                            </div>

                            <a href="#" class="txt--blue text-center see-more">Ver toda</a>

                        </div>

                    </div>
                </div>
            </div>


        </div>


    </div>

    <div class="text-center">
        <div class="my-4">
            <div class="sharebot centered">
                <p class="sharebot--link"><i class="mdi mdi-share-variant"></i> Compartir</p>
                <ul class="share--links">
                    <li><a class="share--link" target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/es/producto/Aguacate/costa-rica"><img
                                src="/img/fb-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://wa.me/?text=https://www.mioa.org/es/producto/Aguacate/costa-rica"><img
                                src="/img/wa-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://twitter.com/home?status=https://www.mioa.org/es/producto/Aguacate/costa-rica "><img
                                src="/img/tw-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/es/producto/Aguacate/costa-rica&title=&summary=&source="><img
                                src="/img/li-icon.svg"></a></li>
                </ul>
            </div>
        </div>
        <a href="{{ route('frutas') }}" class="btn btn--green">Volver</a>
    </div>

</div>

@include('widgets.footer')


<script type="text/javascript" src="/js/main.js"></script>
<script>
    function fillCountries() {
        var data = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;
        var slug = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
        var lang = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "es";
        $("#country").empty();
        if (lang === "es") {
            var html = '<option value="">País</option>';
        } else {
            var html = '<option value="">Country</option>';
        }
        if (data !== false) {
            for (var i = 0; i < data.countries.length; i++) {
                if (slug === false) {
                    html += "<option value='" + data.countries[i].id + "'>" + data.countries[i].trans_name + "</option>";
                } else {
                    html += "<option value='" + data.countries[i].slug + "'>" + data.countries[i].trans_name + "</option>";
                }
            }
        }
        $("#country").append(html);
    }

    $("#region-validate").on("change", function () {
        var val = $(this).val();
        if (val !== "") {
            $.ajax({
                url: "/es/ajax/getCountriesDetailed/" + val + "/Aguacate",
            }).done(function (data) {
                fillCountries(data, true, "es");
            });

        } else {
            fillCountries();
        }
    })

    $(".selected-country").on("change", function () {
        var val = $(this).val();
        if (val !== "") {
            var url = "/es/producto/Aguacate/temp";
            url = url.replace("temp", val);
            window.location.href = url;
        }
    });

</script>


<script async src="https://www.googletagmanager.com/gtag/js?id=G-17L57FSXE7"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'G-17L57FSXE7');
</script>

</body>

</html>