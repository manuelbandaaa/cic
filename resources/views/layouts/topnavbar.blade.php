<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            {{-- <form role="search" class="navbar-form-custom" method="post" action="/"> --}}
                {{-- <div class="form-group"> --}}
                    {{-- <input type="text" placeholder="Buscar..." class="form-control" name="top-search" id="top-search" /> --}}
                {{-- </div> --}}
            {{-- </form> --}}
        </div>
        <ul class="nav navbar-top-links navbar-right">
            @if(\Auth::check())
                
            @endif

            <li>
                <button type="submit" class="btn btn-link" onclick="window.location.href='/ayuda'">
                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true" title="Ayuda"></span>
                </button>  
            </li>

            @if(\Auth::check())
                <li>
                    <form action="{{ url('/logout') }}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-link">
                            <i class="fa fa-sign-out"></i> Salir
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/login">
                        <i class="fa fa-sign-in"></i> Ingresar
                    </a>
                </li>
            @endif
            </li>
        </ul>
    </nav>
</div>
