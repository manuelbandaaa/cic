<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                @if(\Auth::check())
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">
                                        {{ \Auth::user()->name }}
                                    </strong>
                                </span> <span class="text-muted text-xs block">{{ \Auth::user()->position()->first()->name}} <b class="caret"></b></span>
                            </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ action('AdminUsersController@show', \Auth::user()->id) }}">Cuenta de Usuario</a></li>
                        </ul>
                    </div>
                @endif
                <div class="logo-element">
                    CIC
                </div>
            </li>
            <li class="{{-- isActiveRoute('main') --}}">
                <a href="/">
                    <i class="fa fa-th-list"></i> <span class="nav-label">Inicio</span>
                </a>
            </li>
            @if(\Auth::check())
                @if(\Auth::user()->position()->first()->id < 3)
                    @include('layouts.menuAdmin')
                @else
                    @include('layouts.menuUser')
                @endif
            @endif
        </ul>
    </div>
</nav>
