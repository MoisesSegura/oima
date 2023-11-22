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
            <img src="{{ asset($product->product->image) }}" alt="{{ $product->product->name }}"
                class="card--product__img">
            <div class="card--product__content">
                <div class="px-3 card--product__title d-none d-md-block">

                    <p class="card--text">Conocido como</p>
                    <h3 class="card--title">{{$product->known_name}}</h3>

                </div>
                <ul class="card__list bullets--gray list--circle">
                    <li>
                        <p class="card--title">Otros nombres comunes</p>
                        <p class="card--text">{{$product->known_name}} </p>
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

                            <div class="x-scroll__container">
                                <div class="chart--container">
                                    <canvas id="chartPriceIndex2"></canvas>
                                </div>

                            </div>
                            <p>Fuente: </p>
                            <p>Años:</p>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card--md-only">
                            <h3 class="title title--sideline title--underline-md">Requisitos para las Importaciones y
                                Exportaciones entre los Países del CAFTA-RD y Panamá</h3>

                            <p class="txt--gray"></p>

                            <a  href="{{ route('verRequisitos', ['id' => $product->id]) }}" class="card card--link card--centered">
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

                            <a href="{{ route('verInfoAgronomica', ['id' => $product->id]) }}" class="card card--link card--centered">
                                <p class="card--text">Información Agronómica</p>
                            </a>

                            <a href="{{ route('verInfoNutricional', ['id' => $product->id]) }}" class="card card--link card--centered">
                                <p class="card--text">Información Nutricional</p>
                            </a>

                            <a href="{{ route('verGaleria', ['id' => $product->id]) }}" class="card card--link card--centered">
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
            <a href="/es/catalogo" class="btn btn--green">Volver</a>
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
    <script>

        var productDetail = null;
        var language = "es";

        var productDetail = 7;

        $(document).ready(function () {
            $.ajax({
                url: '/' + language + '/ajax/graphics/' + productDetail,
                method: "GET"
            }).done(function (data) {
                switch (data.south) {
                    case true:
                        var offerData = datasetStructure(data.offerCalendar, 'monthLabel', 'value');
                        createChart(offerData, 'chartOffer', 'bar');
                        var productionEvolutionData = datasetStructure(data.production_evolution, 'year', 'value');
                        createChart(productionEvolutionData, 'chartProduction', 'bar');
                        var productionDistributionData = datasetStructure(data.production_percentage, 'category', 'value');
                        createChart(productionDistributionData, 'chartProductionDistribution', 'pie');
                        var exportsEvolutionData = datasetStructure(data.exportation_evolution, 'year', 'value');
                        createChart(exportsEvolutionData, 'chartExports', 'bar');
                        var exportsDistributionData = datasetStructure(data.exportation_destinations, 'category', 'value');
                        createChart(exportsDistributionData, 'chartExportsDestinations', 'pie');
                        var importsEvolutionData = datasetStructure(data.importation_evolution, 'year', 'value');
                        createChart(importsEvolutionData, 'chartImports', 'bar');
                        break;
                    default:
                        for (graphicID in data.graphics) {
                            var priceData = datasetStructure(data.graphics[graphicID], 'monthLabel', 'value');
                            createChart(priceData, 'chartPriceIndex' + graphicID, 'line');
                        }
                }
            });
        });


        ///// CHARTS

        var datasetStructure = function (dataset, labelName, valName) {
            var labels = [];
            var values = [];
            for (var i = 0; i < dataset.length; i++) {
                labels.push(dataset[i][labelName]);
                values.push(dataset[i][valName]);
            }
            return {
                labels: labels,
                values: values
            }
        }

        var createChart = function (data, id, type) {
            var colors = [];
            var borderColor;
            var options;

            if (type === 'bar') {

                for (var i = 0; i < data.values.length; i++) {
                    var color = "#489F8C";
                    if (data.values[i] >= 100) {
                        color = "#489F8C";
                    } else if (data.values[i] >= 50 && data.values[i] < 100) {
                        color = "#9BDCCE"

                    } else if (data.values[i] < 50) {
                        color = "#BAECE1"
                    }

                    colors[i] = color;

                }
                borderColor = "rgba(0,0,0,0)";
                options = {
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            } else if (type === 'line') {
                colors = ['rgba(0,0,0,0)'];
                borderColor = '#489F8C';
                options = {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            } else if (type === 'pie') {
                colors = ["#489F8C", "#9BDCCE", "#BAECE1"];
                borderColor = "rgba(0,0,0,0)";
                options = {
                    responsive: false,
                    legend: {
                        display: true
                    },
                    layout: {
                        padding: {
                            top: 20,
                        }
                    }
                }
            }

            var chart = document.getElementById(id).getContext('2d');
            var myChart = new Chart(chart, {
                type: type,
                data: {
                    labels: data.labels,
                    datasets: [{
                        data: data.values,
                        label: '',
                        borderWidth: 2,
                        backgroundColor: colors,
                        borderColor: borderColor,
                        lineTension: 0,
                        pointRadius: 3,
                        pointBackgroundColor: "#489F8C"
                    }]
                },
                options: options

            });

            fit(myChart, 'height')

        }

        function fit(chart, fitDimension) {
            var cA = chart.chartArea;
            var pixelRatio = chart.currentDevicePixelRatio;
            var chartSize, size, delta;

            chart.canvas.width /= pixelRatio;
            chart.canvas.height /= pixelRatio;

            if (fitDimension === 'width') {
                size = chart.width;
                chartSize = cA.bottom - cA.top;
                if (chartSize < size) {
                    delta = size - chartSize;
                    chart.canvas.height += delta;
                    chart.height += delta;
                }
            } else {
                size = chart.height;
                chartSize = cA.right - cA.left;
                if (chartSize < size) {
                    delta = size - chartSize;
                    chart.canvas.width += delta * pixelRatio;
                    chart.width += delta;
                }
            }

            chart.aspectRatio = chart.canvas.width / chart.canvas.height;
            chart.canvas.style.height = chart.canvas.height + "px";
            chart.canvas.style.width = chart.canvas.width + "px";
            Chart.helpers.retinaScale(chart);
            chart.update();
        }

    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <!--    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151598454-1"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-151598454-1');
            </script>
	-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-17L57FSXE7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-17L57FSXE7');
    </script>

</body>

</html>