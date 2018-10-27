@if(\Auth::user()->position()->first()->id == 3)
    <li class="{{-- isActiveRoute('main') --}}">
        <a href="{{ route('courses.show', \Auth::user()->course()->first()->id) }}">
            <i class="fa fa-wrench"></i> <span class="nav-label">Mi Taller</span>
        </a>
    </li>
    <li class="{{-- isActiveRoute('main') --}}">
        <a href="{{ action('ParticipantsController@getList', \Auth::user()->id) }}">
            <i class="fa fa-male"></i> <span class="nav-label">Participantes</span>
        </a>
    </li>
    <li class="{{-- isActiveRoute('main') --}}">
        <a href="{{ action('AttendanceController@getList', \Auth::user()->id) }}">
            <i class="fa fa-check"></i> <span class="nav-label">Asistencia</span>
        </a>
    </li>
    <li class="{{-- isActiveRoute('main') --}}">
        <a href="{{ action('PlanningController@show', \Auth::user()->id) }}">
            <i class="fa fa-briefcase"></i> <span class="nav-label">Plan de Trabajo</span>
        </a>
    </li>
    <li class="{{-- isActiveRoute('main') --}}">
        <a href="{{ action('ReportsController@getReports', \Auth::user()->id) }}">
            <i class="fa fa-file"></i> <span class="nav-label">Mis Reportes</span>
        </a>
    </li>

@else
    <li class="{{-- isActiveRoute('main') --}}">
        <a href="{{ action('PlanningController@show', \Auth::user()->id) }}">
             <i class="fa fa-plus"></i><span class="nav-label">Propuesta de Taller</span>
        </a>
    </li>
@endif
