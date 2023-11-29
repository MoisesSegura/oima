<div class="nav" role="navigation">
    <a class="logo" href="{{ route('home')}}">OIMA / MIOA</a>
    <ul class="nav__list">
        <li>
            <a class="nav__list--link {{ request()->routeIs('home') ? 'active' : '' }}"
                href="{{ route('home')}}">Inicio</a>
        </li>

        <li>
            <a  class="nav__list--link {{ request()->routeIs('oima') ? 'active' : '' }}"
                href="{{ route('oima')}}">OIMA</a>
        </li>

        <li>
            <a class="nav__list--link {{ request()->routeIs(['publicaciones','presentaciones','documentos-tecnicos','diccionario','videos','normas-procedimientos']) ? 'active' : '' }}"
                href="{{ route('publicaciones')}}">Repositorio</a>
        </li>

        <li>
            <a class="nav__list--link {{ request()->routeIs(['frutas','hortalizas','granos','legumbres']) ? 'active' : '' }}"
                href="{{ route('frutas')}}">Catálogo</a>
        </li>

        <li class=" d-none d-md-block">
            <a class="nav__list--link  {{ request()->routeIs(['eventos','noticias','sima-media']) ? 'active' : '' }}"
                href="{{ route('eventos')}}">Blog</a>
        </li>

        <li class="d-none d-md-block">
            <a class="nav__list--link {{ request()->routeIs('contacto') ? 'active' : '' }}"
                href="{{ route('contacto')}}">Contacto</a>
        </li>
        
     

       
        <!-- <div class="headerdrop">
            <div class="dropdown" data-dropdown>
            <a class="drop" data-dropdown-button>Information</a>
                <div class="dropdown-menu information-grid">
                    <div>
                        <div class="dropdown-heading">Informacion institucional</div>
                        <div class="dropdown-drops">
                            <a href="#" class="drop">@lang('locale.principios')</a>
                            <a href="#" class="drop">@lang('locale.quienes')</a>
                            <a href="#" class="drop">@lang('locale.paisesMiembros')</a>
                            <a href="#" class="drop">@lang('locale.logros')</a>
                        </div>
                    </div>
                    <div>
                        <div class="dropdown-heading">Funcionamiento</div>
                        <div class="dropdown-drops">
                            <a href="#mision-vision" class="drop">Mision y Vision</a>
                            <a href="#" class="drop">@lang('locale.comiteEjecutivo')</a>
                            <a href="#" class="drop">@lang('locale.historia')</a>
                        </div>
                    </div>
                    <div>
                        <div class="dropdown-heading">Ayuda</div>
                        <div class="dropdown-drops">
                            <a href="#" class="drop">@lang('locale.contactoNav')</a>
                        </div>
                    </div>
                   
                </div>
            </div>

        </div> -->
      


        <style>
            .headerdrop {
                background-color: #F3F3F3;
                display: flex;
                align-items: baseline;
                padding: .5rem;
                gap: 1rem;
            }

            .drop {
                background: none;
                border: none;
                text-decoration: none;
                color: #777;
                font-family: inherit;
                font-size: inherit;
                cursor: pointer;
                padding: 0;
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

<script>
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
</script>






    </ul>
    <div class="nav--others">
        <a class="text-decoration-none lang--select" href="locale/es">ES</a>
        <a class="text-decoration-none lang--select" href="locale/en">EN</a>
        <a class="text-decoration-none lang--select" href="locale/pt">PT</a>
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