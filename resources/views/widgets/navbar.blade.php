<div class="nav" role="navigation">
<!-- <img class="oimaLogo" src="{{ asset('/uploads/uploads/oimaLogo.png') }}"> -->
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

        <li>
            <div class="headerdrop">
                <div class="dropdown" data-dropdown>
                    <a class="drop nav__list--link {{ request()->routeIs('oima','quienes','historia') ? 'active' : '' }}"
                        data-dropdown-button>@lang('locale.oima')</a>
                    <div class="dropdown-menu information-grid">
                        <div>
                            <div class="dropdown-heading"></div>
                            <div class="dropdown-drops">
                                <a href="{{ route('oima')}}" class="drop">@lang('locale.principios')</a>
                                <a href="{{ route('quienes')}}" class="drop">@lang('locale.quienes')</a>
                                <a href="{{ route('historia')}}" class="drop">@lang('locale.historia')</a>
                            </div>
                        </div>

                        <!-- <div>
                            <div class="dropdown-heading"></div>
                            <div class="dropdown-drops">
                                <a href="{{ route('oima-funcionamiento')}}#mision-vision"
                                    class="drop">@lang('locale.misionvision')</a>
                              
                            </div>
                        </div> -->
                       

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

        <li class="nav-item dropdown d-md-none">
            <a id="nav-collapse-trigger" class="nav__list--link nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más <i class="mdi mdi-chevron-down"></i></a>
            <div class="dropdown-menu" aria-labelledby="nav-collapse-trigger">
                <a class="nav__list--link " href="{{ route('eventos')}}">Blog</a>
                <a class="nav__list--link active" href="{{ route('contacto')}}">@lang('locale.contacto')</a>
            </div>
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
            transition: opacity 150ms ease-in-out, transform 1500ms ease-in-out;
        }

        .dropdown.active>.drop+.dropdown-menu {
            opacity: 1;
            pointer-events: auto;
            
        }
        .dropdown.active>.drop+.dropdown-menu:hover {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .information-grid {
            display: grid;
            grid-template-columns: repeat(1, max-content);
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

let timer;

document.addEventListener("mouseover", e => {
    const isDropdownButton = e.target.matches("[data-dropdown-button]");
    const isDropdown = e.target.matches("[data-dropdown]");
    const isDropdownItem = e.target.matches("[data-dropdown-item]");

    if (isDropdownButton) {
        clearTimeout(timer);
        const currentDropdown = e.target.closest("[data-dropdown]");
        currentDropdown.classList.add("active");
    } else if (isDropdown || isDropdownItem) {
        clearTimeout(timer);
    }

    document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
        if (!dropdown.contains(e.target)) {
            dropdown.classList.remove("active");
        }
    });
});

document.addEventListener("mouseout", e => {
    const isDropdownButton = e.target.matches("[data-dropdown-button]");
    const isDropdown = e.target.matches("[data-dropdown]");

    if (isDropdownButton || isDropdown) {
        return;
    }

    document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
        timer = setTimeout(() => {
            dropdown.classList.remove("active");
        }, 1000000000); // Ajusta el tiempo en milisegundos según tus necesidades
    });
});



// document.addEventListener("click", e => {
//             const isDropdownButton = e.target.matches("[data-dropdown-button]")
//             if (!isDropdownButton && e.target.closest("[data-dropdown]") != null) return

//             let currentDropdown
//             if (isDropdownButton) {
//                 currentDropdown = e.target.closest("[data-dropdown]")
//                 currentDropdown.classList.toggle("active")
//             }

//             document.querySelectorAll("[data-dropdown].active").forEach(dropdown => {
//                 if (dropdown === currentDropdown) return
//                 dropdown.classList.remove("active")
//             })
//         })



    </script>



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