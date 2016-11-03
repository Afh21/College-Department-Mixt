<ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="userView">

            <img class="background" src="{{asset('images/back.jpg')}}">

            <div class="center">
                <a href="#!user"> <img class="circle" src="{{asset('images/profile.jpg')}}" style="display: initial"> </a>
            </div>

            <span class="name" style="color:black">@if(Auth::user()) {{ Auth::user()->name }} {{Auth::user()->user_lastname}} </span>
            <span class=" email">{{ Auth::user()->email }} @endif</span>

        </div>
    </li>

    <li>
        <ul class="collapsible" data-collapsible="accordion">
            <li>
                <a class="collapsible-header menu"> <i class="fa fa-users left"></i> Usuarios
                    {{-- @if(!Route::is('users'))
                        <button disabled class="btn-floating btn-flat btn-xs waves-effect waves-light grey lighten-1 right tooltiped" style="display: inherit; padding-left: 3px; vertical-align: middle; margin-top: 4px" data-tooltip="Crear Usuario" data-delay="50" data-position="right"> <i class="fa fa-plus"></i> </button>
                    @else
                        <button class="btn-floating btn-flat btn-xs waves-effect waves-light grey lighten-1 right modal-trigger create tooltiped" style="display: inherit; padding-left: 3px; vertical-align: middle; margin-top: 4px" data-target="modalCreate" data-tooltip="Crear Usuario" data-delay="50" data-position="right"> <i class="fa fa-plus" style="color: black"></i> </button>
                    @endif --}}
                </a>

                <div class="collapsible-body">
                   <ul>
                       <li>
                           <a href="">
                               <i class="fa fa-diamond"></i> Administradores
                           </a>
                       </li>
                       <li>
                           <a href="">
                               <i class="fa fa-suitcase"></i> Profesores
                           </a>
                       </li>
                       <li>
                           <a href="">
                               <i class="fa fa-group"></i> Estudiantes
                           </a>
                       </li>
                   </ul>
                </div>
            </li>
            <li>
                <a class="collapsible-header"> <i class="fa fa-gears left"></i> Configuraciones  </a>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="{{route('periods')}}">
                                <i class="fa fa-archive left"></i> Periodos
                                @if(!Route::is('periods'))
                                    <button disabled class="btn-floating btn-flat btn-xs waves-effect waves-light grey lighten-1  right tooltiped" style="display: inherit; vertical-align: middle; margin-top: 4px" data-tooltip="Crear Periodo" data-delay="50" data-position="right"> <i class="fa fa-plus" style="color:white"></i> </button>
                                @else
                                    <button class="btn-floating btn-flat btn-xs waves-effect waves-light grey lighten-1  right modal-trigger createPeriod tooltiped" style="display: inherit; vertical-align: middle; margin-top: 4px" data-target="modalCreatePeriod" data-tooltip="Crear Periodo" data-delay="50" data-position="right"> <i class="fa fa-plus" style="color:black"></i> </button>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{route('maths')}}">
                                <i class="fa fa-newspaper-o left"></i> Materias
                                @if(!Route::is('maths'))
                                    <button disabled class="btn-floating btn-flat btn-xs waves-effect waves-light grey lighten-1  right tooltiped" style="display: inherit; vertical-align: middle; margin-top: 4px" data-tooltip="Crear Materia" data-delay="50" data-position="right"> <i class="fa fa-plus" style="color:white"></i> </button>
                                @else
                                    <button class="btn-floating btn-flat btn-xs waves-effect waves-light grey lighten-1  right modal-trigger createMath tooltiped" style="display: inherit; vertical-align: middle; margin-top: 4px" data-target="modalCreateMath" data-tooltip="Crear Materia" data-delay="50" data-position="right"> <i class="fa fa-plus" style="color:black"></i> </button>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{route('groups')}}">
                                <i class="fa fa-navicon left"></i> Grupos
                                @if(!Route::is('groups'))
                                    <button disabled class="btn-floating btn-flat btn-xs waves-effect waves-light grey lighten-1  right tooltiped" style="display: inherit; vertical-align: middle; margin-top: 4px" data-tooltip="Crear Grupo" data-delay="50" data-position="right">
                                        <i class="fa fa-plus" style="color:white"></i> </button>
                                @else
                                    <button class="btn-floating btn-flat btn-xs waves-effect waves-light grey lighten-1  right modal-trigger createGroup tooltiped" style="display: inherit; vertical-align: middle; margin-top: 4px" data-target="modalCreateGroup" data-tooltip="Crear Grupo" data-delay="50" data-position="right">
                                        <i class="fa fa-plus" style="color:black"></i> </button>
                                @endif
                            </a>
                        </li>
                    </ul>
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

        