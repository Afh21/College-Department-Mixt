<ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="userView">

            <img class="background" src="{{asset('images/back.jpg')}}">

            <div class="center">
                <a href="#!user"> <img class="circle" src="{{asset('images/profile.jpg')}}" style="display: initial"> </a>
            </div>

            <a href="#!name"> <span class="name" style="color:black">{{ Auth::user()->name }} {{Auth::user()->user_lastname}}</span> </a>
            <a href="#!email"> <span class=" email">jdandturk@gmail.com</span> </a>

        </div>
    </li>

    <li>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <a class="collapsible-header"> <i class="fa fa-users left"></i> Usuarios </a>
                <div class="collapsible-body">
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </li>
            <li>
                <a class="collapsible-header"> <i class="fa fa-gears left"></i> Grupos </a>
                <div class="collapsible-body">
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </li>
            <li>
                <a class="collapsible-header"> <i class="fa fa-gears left"></i> Materias </a>
                <div class="collapsible-body">
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </li>
        </ul>
    </li>
    <li>
        <div class="divider"></div>
    </li>
    <li>
        <a class="waves-effect" href="{{url('/logout')}}"><i class="fa fa-sign-out"></i>Cerrar Sesion</a>
    </li>

</ul>

        