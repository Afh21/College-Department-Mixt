<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>

        <ul class="right hide-on-med-and-down">
            @if (Auth::guest())
                <li>
                    <a href="{{ url('/login') }}">Ingresar</a>
                </li>
            @else
                <li>
                    @if(Auth::user()->is('administrator'))
                        <i class="fa fa-shield right" style="padding-right:15px"> </i>
                    @elseif(Auth::user()->is('teacher'))
                        <i class="fa fa-graduation-cap right" style="padding-right:15px"> </i>
                    @else
                        <i class="fa fa-child right" style="padding-right:15px"> </i>
                    @endif
                        Sr, {{ Auth::user()->name }}
                </li>
                <li>
                    <a class="dropdown-button" href="#!" data-activates="dropdown1" style="padding-left: 50px"> Opciones
                        <i class="fa fa-gears right"></i>
                    </a>
                </li>

            @endif

        </ul>
    </div>
</nav>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li>
        @if(Auth::guest())
        @elseif(Auth::user()->is('administrator'))
            <a href="{{url('/dashboard')}}">
                <i class="fa fa-dashboard"></i> &nbsp; Dashboard
            </a>
        @elseif(Auth::user()->is('teacher'))
            <a href="{{route('user.show', Auth::user()->id)}}">
                <i class="fa fa-graduation"></i> &nbsp; Perfil Profesor
            </a>
        @else
            <a href="">
                <i class="fa fa-child"></i> &nbsp; Perfil Estudiante
            </a>
        @endif
    </li>

    <li class="divider"></li>

    <li>
        <a href="{{ url('/logout') }}">
            <i class="fa fa-sign-out"></i> &nbsp; Cerrar Sesion
        </a>
    </li>
</ul>
