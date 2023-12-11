<div class="nav" role="navigation">
    <a class="logo" href="{{ route('home')}}">OIMA / MIOA</a>

    <div class="social-media-container">
    <ul class="social-media-list">
        @foreach ($socialmedia as $media)
            <li>
                <a class="share--link" target="_blank" href="{{ $media->url }}">
                    <img src="{{ asset(trim('/uploads/' . $media->icon, '/')) }}" alt="{{ $media->icon }}">
                </a>
            </li>
        @endforeach
    </ul>
</div>


<style>

.social-media-container {
    display: flex;
    justify-content: center;
}

.social-media-list {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    gap: .5rem; /* Espaciado entre cada ícono de red social */
}

.share--link {
    display: block;
    width: 2rem; /* Ajusta el ancho según tus necesidades */
    height: 2rem; /* Ajusta la altura según tus necesidades */
    overflow: hidden;
}

.share--link img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ajusta la posición y el tamaño de la imagen */
    border-radius: 50%; /* Para hacer imágenes redondas */
}



</style>
    <ul class="nav__list">
        <li>
            <a class="nav__list--link {{ request()->routeIs('home') ? 'active' : '' }}"
                href="{{ route('home')}}">@lang('locale.inicio')</a>
        </li>

        <!-- <li>
            <a class="nav__list--link {{ request()->routeIs('oima') ? 'active' : '' }}"
                href="{{ route('oima')}}">@lang('locale.oima')</a>
        </li> -->

        <li>
            <div class="headerdrop">
                <div class="dropdown" data-dropdown>
                    <a class="drop nav__list--link {{ request()->routeIs('oima') ? 'active' : '' }}"
                        data-dropdown-button>@lang('locale.oima')</a>
                    <div class="dropdown-menu information-grid">
                        <div>
                            <div class="dropdown-heading">@lang('locale.info')</div>
                            <div class="dropdown-drops">
                                <a href="{{ route('oima')}}" class="drop">@lang('locale.principios')</a>
                                <a href="{{ route('oima')}}#Quienes-somos" class="drop">@lang('locale.quienes')</a>
                                <a href="{{ route('oima')}}#Miembros" class="drop">@lang('locale.paisesMiembros')</a>
                                <a href="{{ route('oima')}}#Logros" class="drop">@lang('locale.logros')</a>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown-heading">@lang('locale.funcionamiento')</div>
                            <div class="dropdown-drops">
                                <a href="{{ route('oima-funcionamiento')}}#mision-vision"
                                    class="drop">@lang('locale.misionvision')</a>
                                <a href="{{ route('oima-funcionamiento')}}#Comite-Ejecutivo"
                                    class="drop">@lang('locale.comiteEjecutivo')</a>
                                <a href="{{ route('historia')}}" class="drop">@lang('locale.historia')</a>
                            </div>
                        </div>
                        <div>
                            <div class="dropdown-heading">@lang('locale.ayuda')</div>
                            <div class="dropdown-drops">
                                <a href="{{ route('contacto')}}#contactar" class="drop">@lang('locale.contactoNav')</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </li>

        <li>
            <a class="nav__list--link {{ request()->routeIs(['publicaciones','presentaciones','documentos-tecnicos','informes-regionales','diccionario','videos','normas-procedimientos']) ? 'active' : '' }}"
                href="{{ route('publicaciones')}}">@lang('locale.repo')</a>
        </li>

        <li>
            <a class="nav__list--link {{ request()->routeIs(['frutas','hortalizas','granos','legumbres']) ? 'active' : '' }}"
                href="{{ route('frutas')}}">@lang('locale.catalogonav')</a>
        </li>

        <li class=" d-none d-md-block">
            <a class="nav__list--link  {{ request()->routeIs(['eventos','noticias','sima-media']) ? 'active' : '' }}"
                href="{{ route('eventos')}}">Blog</a>
        </li>

        <li class="d-none d-md-block">
            <a class="nav__list--link {{ request()->routeIs('contacto') ? 'active' : '' }}"
                href="{{ route('contacto')}}">@lang('locale.contacto')</a>
        </li>



    </ul>


    <style>
        .headerdrop {
            /* background-color: rgba(55, 102, 151, 0);
                display: flex;
                align-items: baseline; */
            /* gap: 1rem;
                padding: .5rem; */
            padding: 1rem;

        }

        .drop {
            background: none;
            border: none;
            text-decoration: none;
            color: #777;
            /* font-family: inherit;
                font-size: inherit; */
            cursor: pointer;
            padding: 0;
            /* font-weight: bold;  */
        }

        .dropdown.active>.drop,
        .drop:hover {
            color: black;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            left: 0;
            top: calc(100% + .25rem);
            background-color: white;
            padding: .75rem;
            border-radius: .25rem;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .1);
            opacity: 0;
            pointer-events: none;
            transform: translateY(-10px);
            transition: opacity 150ms ease-in-out, transform 150ms ease-in-out;
        }

        .dropdown.active>.drop+.dropdown-menu {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .information-grid {
            display: grid;
            grid-template-columns: repeat(4, max-content);
            gap: 2rem;
        }

        .dropdown-drops {
            display: flex;
            flex-direction: column;
            gap: .25rem;
        }

        .login-form>input {
            margin-bottom: .5rem;
        }




        .lang--select.active {
            /* background-color: white;
            color:  rgba(55, 102, 151);
            border-radius: 5px; 
            padding: .1rem; */
            font-size: 1.1em;
            font-weight: bold;
        }
    </style>


    <script>

        document.addEventListener("click", e => {
            const isDropdownButton = e.target.matches("[data-dropdown-button]")
            if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return

            let currentDropdown
            if (isDropdownButton) {
                currentDropdown = e.target.closest("[data-dropdown]")
                currentDropdown.classList.toggle("active")
            }

            document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
                if (dropdown === currentDropdown) return
                dropdown.classList.remove("active")
            })
        })

    </script>

    <!-- <script>
    $(document).ready(function() {
        // Manejar el clic en los enlaces del menú
        $('.dropdown-drops a').on('click', function(event) {
            // Evitar el comportamiento predeterminado del enlace
            event.preventDefault();

            // Obtener el identificador de la sección a la que quieres desplazarte
            var target = $(this).attr('href');

            // Realizar el desplazamiento suave hasta la sección
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 1000); // El valor 1000 es la duración de la animación en milisegundos
        });
    });
</script> -->


    <div class="nav--others">
        <a class="text-decoration-none lang--select{{ app()->getLocale() === 'es' ? ' active' : '' }}"
            href="{{ route('locale', ['locale' => 'es']) }}">Español</a>
        <a class="text-decoration-none lang--select{{ app()->getLocale() === 'en' ? ' active' : '' }}"
            href="{{ route('locale', ['locale' => 'en']) }}">English</a>
        <a class="text-decoration-none lang--select{{ app()->getLocale() === 'pt' ? ' active' : '' }}"
            href="{{ route('locale', ['locale' => 'pt']) }}">Português</a>


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