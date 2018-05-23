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
            @if(\Auth::check())
                {{--@include('layouts.menuDep')--}}
                @if(\Auth::user()->position()->first()->id < 3)
                    @include('layouts.menuAdmin')
                @endif
            @endif
        </ul>
    </div>
</nav>
