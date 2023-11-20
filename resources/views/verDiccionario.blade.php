@include('widgets.header')
@include('widgets.navbar')
    <div class="content">
        <div class="d-flex justify-content-between">
            <div class="backbot">
                <a href="/es/producto/Aguacate" class="backbot--link"><i class="mdi mdi-chevron-left"></i> Volver</a>
            </div>
            <div class="sharebot ">
                <p class="sharebot--link"><i class="mdi mdi-share-variant"></i> Compartir</p>
                <ul class="share--links">
                    <li><a class="share--link" target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=https://www.mioa.org/es/diccionario/Aguacate"><img
                                src="/img/fb-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://wa.me/?text=https://www.mioa.org/es/diccionario/Aguacate"><img
                                src="/img/wa-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://twitter.com/home?status=https://www.mioa.org/es/diccionario/Aguacate "><img
                                src="/img/tw-icon.svg"></a></li>
                    <li><a class="share--link" target="_blank"
                            href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.mioa.org/es/diccionario/Aguacate&title=&summary=&source="><img
                                src="/img/li-icon.svg"></a></li>
                </ul>
            </div>
        </div>
        <div class="line-blue-container">
            <div class="card card--product card--line-blue">
                <div class="card--product__title d-md-none">
                    <h3 class="card--title">Aguacate</h3>
                </div>
                <img src="{{ asset($product->product->image) }}" alt=""
                    class="card--product__img">
                <div class="card--product__content">
                    <div class="px-3 card--product__title d-none d-md-block">
                        <h3 class="card--title">{{ __($product->product->name) }}</h3>
                    </div>
                    <ul class="card__list bullets--green list--circle">
                        <li>
                            <p class="card--title">Otros nombres comunes</p>

                            @foreach($relatedProducts as $relatedProduct)
                            <p class="card--text">{{ $relatedProduct->concatenated_known_names }}</p>
                            @endforeach

                        </li>
                        <li>
                            <p class="card--title">Nombre científico</p>
                            <p class="card--text">{{ $product->product->scientific_name }}</p>
                        </li>
                        <li>
                            <p class="card--title">Familia</p>
                            <p class="card--text">{{ $product->product->family_name }}</p>
                        </li>
                    </ul>
                    <a href="/es/producto/Aguacate" class="btn btn--green">Ver en catálogo</a>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center">
            <h3 class="title d-none d-md-block">Otros nombres del producto</h3>
            <div class="selectors__container">
                <div class="selectors">
                    <div class="select--wrapper">
                        <select class="select" name="region" id="region-dictionary">
                            <option value="">Todas las regiones</option>
                            <option value="central">Región Central</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="title d-md-none text-center">Nombre común por países</h4>

        <ul class="list--countries" id="countries">
            <li>
                <p><span class="flag flag--cr"></span> <span class="txt--gray">Costa Rica</span></p>
                <p class="country--product">Aguacate</p>
            </li>
            
            <li>
                <p><span class="flag flag--sv"></span> <span class="txt--gray">El Salvador</span></p>
                <p class="country--product">Aguacate</p>
            </li>
            <li>
                <p><span class="flag flag--gt"></span> <span class="txt--gray">Guatemala</span></p>
                <p class="country--product">Aguacate</p>
            </li>
            <li>
                <p><span class="flag flag--hn"></span> <span class="txt--gray">Honduras</span></p>
                <p class="country--product">Palta</p>
            </li>
            <li>
                <p><span class="flag flag--ni"></span> <span class="txt--gray">Nicaragua</span></p>
                <p class="country--product">Aguacate</p>
            </li>
            <li>
                <p><span class="flag flag--pa"></span> <span class="txt--gray">Panamá</span></p>
                <p class="country--product">Aguacate</p>
            </li>
            <li>
                <p><span class="flag flag--do"></span> <span class="txt--gray">República Dominicana</span></p>
                <p class="country--product">Palta</p>
            </li>
        </ul>

        <div class="text-center mb-5">
            <a href="javascript:history.back()" class="txt--blue"><strong>Volver</strong></a>
        </div>
    </div>

    <footer>
        <div>
            <a class="logo">OIMA/MIOA</a>
            <img class="d-none d-md-block" src="/img/map-white.png" width="100" />
        </div>
        <div class="d-none d-md-block">
            <p><strong>Explora</strong></p>
            <ul class="footer__list footer__links ">
                <li><a href="/es/">Inicio</a></li>
                <li><a href="/es/repositorio">Repositorio</a></li>
                <li><a href="/es/blog">Blog</a></li>
                <li><a href="/es/oima">OIMA</a></li>
                <li><a href="/es/catalogo">Catálogo</a></li>
                <li><a href="/es/contacto">Contacto</a></li>
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
    <script type="text/javascript" src="/js/main.js"></script>
    <script>
        $("#region-dictionary").on("change", function () {
            var val = $(this).val();
            var url = "/es/diccionario/Aguacate";
            if (val !== "") {
                window.location.href = url + "/" + val;
            } else {
                window.location.href = url;
            }
        });

        var is_ajax = false;
        var page = 2;
        var cantPages = 1;

        $("#more-results").on('click', function (e) {
            e.preventDefault();
            if (is_ajax === false) {
                is_ajax = true;
                $.ajax({
                    url: "/es/ajax/getDictionary-no-region/Aguacate/" + page,
                    method: "GET"
                }).done(function (data) {
                    is_ajax = false;
                    page++;

                    $("#countries").append(data);

                    if (cantPages < page) {
                        $("#more-results").css("display", "none");
                    }
                });
            }
        });

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