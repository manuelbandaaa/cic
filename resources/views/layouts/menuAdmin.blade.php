<li>
    <a href="#">
        <i class="fa fa-user"></i><span class="nav-label">Aspirantes</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li>
            <a href="{{ route('candidates.create')}}">
                <i class="fa fa-plus"></i> Registrar Aspirante
            </a>    
        </li>
        <li>
            <a href="{{ action('CandidatesController@list', 'elementary-school') }}">
                <i class="fa fa-address-book"></i> Primaria
            </a>    
        </li>
        <li>
            <a href="{{ action('CandidatesController@list', 'secondary-school') }}">
                <i class="fa fa-address-book"></i> Secundaria
            </a>    
        </li>
        <li>
            <a href="{{ action('CandidatesController@list', 'high-school') }}">
                <i class="fa fa-graduation-cap"></i> Preparatoria
            </a>    
        </li>
        <li>
            <a href="{{ action('CandidatesController@list', 'university') }}">
                <i class="fa fa-graduation-cap"></i> Universidad
            </a>    
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="fa fa-book"></i><span class="nav-label">Becarios</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="nav nav-second-level collapse">
        <li>
            <a href="{{ action('StudentsController@list', 'elementary-school') }}">
                <i class="fa fa-address-book"></i> Primaria
            </a>    
        </li>
        <li>
            <a href="{{ action('StudentsController@list', 'secondary-school') }}">
                <i class="fa fa-address-book"></i> Secundaria
            </a>    
        </li>
        <li>
            <a href="{{ action('StudentsController@list', 'high-school') }}">
                <i class="fa fa-graduation-cap"></i> Preparatoria
            </a>    
        </li>
        <li>
            <a href="{{ action('StudentsController@list', 'university') }}">
                <i class="fa fa-graduation-cap"></i> Universidad
            </a>    
        </li>
    </ul>
</li>
<li class="{{-- isActiveRoute('main') --}}">
    <a href="{{ action('CoursesController@index') }}">
        <i class="fa fa-wrench"></i> <span class="nav-label">Talleres</span>
    </a>
</li>
@if(\Auth::user()->position_id == 1)
<li class="{{-- isActiveRoute('main') --}}">
    <a href="{{ action('EventsController@index') }}">
        <i class="fa fa-calendar"></i> <span class="nav-label">Eventos</span>
    </a>
</li>
@endif
<li class="{{-- isActiveRoute('main') --}}">
    <a href="{{ action('AnnouncementsController@index') }}">
        <i class="fa fa-volume-up"></i> <span class="nav-label">Avisos</span>
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
                <i class="fa fa-users"></i> Personal
            </a>
        </li>
    </ul>
</li>