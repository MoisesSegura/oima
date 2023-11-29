<div class="d-none d-md-block">
    <ul class="nav nav-tabs" role="tablist">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('publicaciones') ? 'active' : '' }}" href="{{ route('publicaciones')}}">@lang('locale.publicaciones')</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('presentaciones') ? 'active' : '' }}" href="{{ route('presentaciones')}}">@lang('locale.presentaciones')</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs(['documentos-tecnicos', 'informes-regionales']) ? 'active' : '' }}" href="{{ route('documentos-tecnicos') }}">@lang('locale.documentos')</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('diccionario') ? 'active' : '' }}" href="{{ route('diccionario')}}">@lang('locale.diccionario')</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('videos') ? 'active' : '' }}" href="{{ route('videos')}}">@lang('locale.videos')</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('normas-procedimientos') ? 'active' : '' }}" href="{{ route('normas-procedimientos')}}">@lang('locale.normas')</a>
        </li>
    </ul>
</div>
