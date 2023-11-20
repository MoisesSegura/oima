<div class="d-none d-md-block">
    <ul class="nav nav-tabs" role="tablist">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('publicaciones') ? 'active' : '' }}" href="{{ route('publicaciones')}}">Publicaciones</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('presentaciones') ? 'active' : '' }}" href="{{ route('presentaciones')}}">Presentaciones</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs(['documentos-tecnicos', 'informes-regionales']) ? 'active' : '' }}" href="{{ route('documentos-tecnicos') }}">Documentos Técnicos</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('diccionario') ? 'active' : '' }}" href="{{ route('diccionario')}}">Diccionario</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('videos') ? 'active' : '' }}" href="{{ route('videos')}}">Videos</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('normas-procedimientos') ? 'active' : '' }}" href="{{ route('normas-procedimientos')}}">Normas de Procedimiento</a>
        </li>
    </ul>
</div>
