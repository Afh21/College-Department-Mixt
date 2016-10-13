<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo">Logo</a>

        <ul class="right hide-on-med-and-down">
            @if (Auth::guest())
                <li>
                    <a href="{{ url('/login') }}">Ingresar</a>
                </li>
                <li>
                    <a href="{{ url('/register') }}">Registrarse</a>
                </li>
            @else
                <li>
                    <i class="fa fa-shield right"></i> Sr, {{ Auth::user()->name }}
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
        <a href="">
            <i class="fa fa-dashboard"></i> &nbsp; Dashboard
        </a>
    </li>

    <li class="divider"></li>

    <li>
        <a href="{{ url('/logout') }}">
            <i class="fa fa-sign-out"></i> &nbsp; Cerrar Sesion
        </a>
    </li>
</ul>
