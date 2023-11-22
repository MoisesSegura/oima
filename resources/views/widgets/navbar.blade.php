<div class="nav" role="navigation">
    <a class="logo" href="https://www.mioa.org/">OIMA / MIOA</a>
    <ul class="nav__list">
        <li>
            <a class="nav__list--link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home')}}">Inicio</a>
        </li>
        
        <li>
            <a class="nav__list--link {{ request()->routeIs('oima') ? 'active' : '' }}" href="{{ route('oima')}}">OIMA</a>
        </li>

        <li>
            <a class="nav__list--link {{ request()->routeIs(['publicaciones','presentaciones','documentos-tecnicos','diccionario','videos','normas-procedimientos']) ? 'active' : '' }}" href="{{ route('publicaciones')}}">Repositorio</a>
        </li>

        <li>
            <a class="nav__list--link {{ request()->routeIs(['frutas','hortalizas','granos','legumbres']) ? 'active' : '' }}" href="{{ route('frutas')}}">Catálogo</a>
        </li>

        <li class=" d-none d-md-block">
            <a class="nav__list--link  {{ request()->routeIs(['eventos','noticias','sima-media']) ? 'active' : '' }}" href="{{ route('eventos')}}">Blog</a>
        </li>

        <li class="d-none d-md-block">
            <a class="nav__list--link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto')}}">Contacto</a>
        </li>

        <li class="nav-item dropdown d-md-none">
            <a id="nav-collapse-trigger" class="nav__list--link nav-link dropdown-toggle" href="#"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más <i class="mdi
            mdi-chevron-down"></i></a>
            <div class="dropdown-menu" aria-labelledby="nav-collapse-trigger">
                <a class="nav__list--link " href="blog/eventos.html">Blog</a>
                <a class="nav__list--link " href="contacto.html">Contacto</a>
            </div>
        </li>
    </ul>
    <div class="nav--others">
        <a class="text-decoration-none lang--select" href="{{ route('change-language',['locale' => 'es']) }}">ES</a>
        <a class="text-decoration-none lang--select" href="{{ route('change-language',['locale' => 'en']) }}">EN</a>
        <a class="text-decoration-none lang--select" href="{{ route('change-language',['locale' => 'pt']) }}">PT</a>
        <!-- <p>Current Language: {{ app()->getLocale() }}</p> -->
        <button class="btn btn--clear search--trigger"><i class="mdi mdi-magnify"></i></button>
        <div class="search__box-container">
            <div class="search__box">
                <form action="https://www.mioa.org/es/buscar" method="get">
                    <div class="input--wrap-nav">
                        <input type="text" name="q" placeholder="Ingrese su búsqueda">
                    </div>
                    <button type="submit" class="btn btn--small btn--green">IR</button>
                </form>
                <button class="btn btn--clear search--trigger"><i class="mdi mdi-close"></i></button>
            </div>
        </div>
    </div>
</div>