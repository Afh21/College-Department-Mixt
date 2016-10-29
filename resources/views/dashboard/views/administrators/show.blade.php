<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile </title>

    @include('layouts.links.css')
</head>
<body>

    <div class="row">

        <div class="col l12 center-align">
            @foreach($user->roles as $role)
                @if($role->slug == 'administrator') <h1> <i class="fa fa-diamond"></i>          </h1>
                @elseif($role->slug == 'teacher')   <h1> <i class="fa fa-graduation-cap"></i>   </h1>
                @else                               <h1> <i class="fa fa-child"></i>            </h1>
                @endif
            @endforeach
            <span style="font-size: 4.2em"> {!! $user->name  !!} </span> <span style="font-size: 3.2em" > {!! $user->user_lastname !!} </span>
        </div>


        <div class="col l5" style="margin-top: 50px">

            <div class="col l12">
                <p class="center"> <b> Datos Personales </b> </p>
                <div class="col l6">
                    <ul>
                        <li>
                            <span class="chip"> <i class="fa fa-hashtag"></i> </span> <span class="chip"> {!! $user->user_identity !!} </span>
                        </li>
                        <li>
                            <span class="chip"> <i class="fa fa-envelope-o"></i> </span> <span class="chip"> {!! $user->email !!} </span>
                        </li>
                        <li>
                            @if($user->genre == 'F') <span class="chip">  <i class="fa fa-venus"></i></span> <span class="chip"> Femenino </span> @else <span class="chip"> <i class="fa fa-mars"></i> </span> <span class="chip"> Masculino </span> @endif
                        </li>
                        <li>
                            <span class="chip"> <i class="fa fa-map-marker"></i> </span> <span class="chip"> {!! $user->user_department !!}, {!! $user->user_town !!}</span>
                        </li>
                        <li>
                            <span class="chip"> <i class="fa fa-heart-o"></i> </span> <span class="chip"> {!! $user->user_blood !!} </span>
                        </li>
                    </ul>
                </div>
                <div class="col l6">
                    <ul>
                        <li>
                            <span class="chip"> <i class="fa fa-birthday-cake"></i> </span> <span class="chip"> {!! $user->user_birthday !!} </span>
                        </li>
                        <li>
                            <span class="chip"> <i class="fa fa-tags"></i></span> <span class="chip"> {!! $user->user_age !!} años </span>
                        </li>
                        <li>
                            <span class="chip"> <i class="fa fa-phone"></i> </span> <span class="chip"> {!! $user->user_phone !!} </span>
                        </li>
                        <li>
                            <span class="chip"> <i class="fa fa-map-marker"></i> </span> <span class="chip"> {!! $user->user_address!!} </span>
                        </li>
                        <li>
                            @if($user->user_state == 'enabled')
                                <span class="chip"> <i class="fa fa-thumbs-up"></i> </span> <span class="chip"> Activo </span>
                            @else
                                <span class="chip"> <i class="fa fa-thumbs-down"></i> </span> <span class="chip"> Inactivo </span>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="col l12">
                    <p class="center"> <b> Datos academicos </b> </p>
                    <ul>
                        <li style="display: inline">
                        @if($user->TeacherGroups->count() > 0)
                            <span class="chip">Grupos: </span>
                            @foreach($user->TeacherGroups as $group)
                                  <button class="btn-floating waves-effect waves-circle"> {!! $group->group_name !!}</button>
                            @endforeach
                        @endif
                        @if($user->group)
                            <span class="chip">Grupo: </span>
                            <span class="chip"> {!! $user->group->group_name !!}</span>
                        @endif
                        </li>

                        <li style="margin-top: 20px">
                        @if($user->is('teacher') && $user->TeacherMaths)
                            <span class="chip">Materias: </span>
                            @foreach($user->TeacherMaths as $math)
                                <span class="chip"> {!! $math->math_code !!} - {!! $math->math_name !!}</span>
                            @endforeach
                        @endif
                        </li>

                    </ul>
                </div>
            </div>

        </div>

        <div class="col l7" style="margin-top: 50px">
            <table>
                <thead>
                <tr>
                    <th data-field="group"> Grupo</th>
                    <th data-field="math">  Materias del profesor</th>
                    <th data-field="period"> Periodos (Habilitados / Deshabilitados) </th>
                </tr>
                </thead>

                <tbody>

                @foreach($user->TeacherGroups as $gruposProfesor)
                    @foreach($gruposProfesor->GroupMaths as $materiasGruposProfesor)
                            @foreach($user->TeacherMaths as $materiasProfesor)
                                @if($materiasProfesor->id == $materiasGruposProfesor->id)

                                        <tr>
                                            <td data-group="{!! $gruposProfesor->id !!}">    <span class="chip"> {!! $gruposProfesor->group_name !!} </span>         </td>
                                            <td data-math="{!! $materiasProfesor->id !!}">    <span class="chip">{!! $materiasProfesor->math_name !!}  </span>        </td>
                                            <td data-user="{!! $user->id !!}">
                                                <!-- Si el usuario autenticado es igual al usuario que se ve  RECORDAR CAMBIAR EL != x == -->
                                                @if($user->id != Auth::user()->id)  <!-- ...... RECORDARSE .... -->
                                                    @foreach($materiasProfesor->periods as $period)
                                                        @if($period->period_state == 0)
                                                            <button class="btn-floating waves-effect waves-circle tooltipped" disabled data-period="{!! $period->id !!}" data-tooltip="Deshabilitado" data-delay="50" data-position="left">{!! $period->period_name !!}</button>
                                                        @else
                                                            <button class="btn-floating waves-effect waves-circle tooltipped"  data-period="{!! $period->id !!}" data-tooltip="Habilitado" data-delay="50" data-position="right">{!! $period->period_name !!}</button>
                                                        @endif
                                                    @endforeach
                                                {{-- @else
                                                    @foreach($materiasProfesor->periods as $period)
                                                        @if($period->period_state == 0)
                                                            <button class="btn-floating waves-effect waves-circle tooltipped" disabled data-period="{!! $period->id !!}" data-tooltip="Deshabilitado" data-delay="50" data-position="left">{!! $period->period_name !!}</button>
                                                        @else
                                                            <button class="btn-floating waves-effect waves-circle tooltipped"  disabled data-period="{!! $period->id !!}" data-tooltip="Deshabilitado" data-delay="50" data-position="right">{!! $period->period_name !!}</button>
                                                        @endif
                                                    @endforeach
                                                    --}}
                                                @endif
                                            </td>
                                        </tr>

                                @endif
                        @endforeach
                    @endforeach
                @endforeach

                </tbody>
            </table>

            {{-- @if($user->id == Auth::user()->id)
                <div class="col l12"><a href="{{url('logout')}}" class="btn-floating white"> <i class="fa fa-sign-out" style="color: black"></i> </a></div>
            @else
                <div class="col l12"><a href="{{route('users')}}" class="btn-floating white"> <i class="fa fa-rotate-left" style="color: black"></i> </a></div>
            @endif --}}

        </div>
    </div>

    @include('layouts.links.js')
    @section('js')
        <script>
            $(document).ready(function () {
                $('.tooltipped').tooltip();
            })
        </script>
    @endsection
</body>
</html>