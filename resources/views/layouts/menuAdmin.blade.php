<li>
    <a href="#">
        <i class="fa fa-user"></i><span class="nav-label">Aspirantes</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li>
            <a href="#">
                <i class="fa fa-address-book"></i> Primaria
            </a>    
        </li>
        <li>
            <a href="#">
                <i class="fa fa-address-book"></i> Secundaria
            </a>    
        </li>
        <li>
            <a href="#">
                <i class="fa fa-graduation-cap"></i> Preparatoria
            </a>    
        </li>
        <li>
            <a href="#">
                <i class="fa fa-graduation-cap"></i> Universidad
            </a>    
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="fa fa-book"></i><span class="nav-label">Becados</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li>
            <a href="#">
                <i class="fa fa-address-book"></i> Primaria
            </a>    
        </li>
        <li>
            <a href="#">
                <i class="fa fa-address-book"></i> Secundaria
            </a>    
        </li>
        <li>
            <a href="#">
                <i class="fa fa-graduation-cap"></i> Preparatoria
            </a>    
        </li>
        <li>
            <a href="#">
                <i class="fa fa-graduation-cap"></i> Universidad
            </a>    
        </li>
    </ul>
</li>
<li class="{{-- isActiveRoute('main') --}}">
    <a href="#">
        <i class="fa fa-wrench"></i> Talleres
    </a>
</li>
<li class="{{-- isActiveRoute('main') --}}">
    <a href="#">
        <i class="fa fa-volume-up"></i> Avisos
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-cogs"></i><span class="nav-label">Administración</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li>
            <a href="{{ route('users.index')}}">
                <i class="fa fa-users"></i> Usuarios
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="fa fa-play"></i><span class="nav-label">Inicialización</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li class="{{-- isActiveRoute('main') --}}">
            <a href="#">
                <i class="fa fa-download"></i> Importar Archivos
            </a>
        </li>
        <li class="{{-- isActiveRoute('main') --}}">
            <a href="#">
                <i class="fa fa-database"></i> Poblar BD
            </a>
        </li>   
    </ul>
</li>
