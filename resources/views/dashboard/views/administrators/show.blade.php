<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile </title>
    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">

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
                                  <button class="btn-floating waves-effect waves-circle" style="margin: 1px 10px"> {!! $group->group_name !!}</button> @if($group->students) {!! $group->students->count() !!} @endif
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

                                        <tr data-group="{!! $gruposProfesor->id !!}">
                                            <td data-group="{!! $gruposProfesor->id !!}" id="GroupId">    <span class="chip"> {!! $gruposProfesor->group_name !!} </span>         </td>
                                            <td data-math="{!! $materiasProfesor->id !!}" id="MathId">    <span class="chip">{!! $materiasProfesor->math_name !!}  </span>        </td>
                                            <td data-user="{!! $user->id !!}" id="UserId">
                                                <!-- Si el usuario autenticado es igual al usuario que se ve  RECORDAR CAMBIAR EL != x == -->

                                                @if($user->id != Auth::user()->id)  <!-- ...... RECORDARSE .... -->
                                                    @foreach($materiasProfesor->periods as $period)
                                                        @if($period->period_state == 0)
                                                            <button class="btn-floating waves-effect waves-circle tooltipped" disabled data-period="{!! $period->id !!}" data-tooltip="Deshabilitado" data-delay="50" data-position="left">{!! $period->period_name !!}</button>
                                                        @else
                                                            <button class="btn-floating waves-effect waves-circle tooltipped modal-trigger AskGroup" data-target="modalNote"  data-period="{!! $period->id !!}" data-group="{!! $gruposProfesor->id !!}" data-tooltip="Habilitado" data-delay="50" data-position="right">{!! $period->period_name !!}</button>
                                                        @endif
                                                    @endforeach
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

    <div id="note">

    </div>


    @include('layouts.links.js')
    @yield('js')
        <script>
            $(document).ready(function () {
                $('.tooltipped').tooltip();
                $('.modal-trigger').leanModal({dismissible: false});

                $('.modal-trigger.AskGroup').click(function (){

                    var tr      = $(this).parents('tr');
                    var Group   = tr.find('td#GroupId').attr('data-group');
                    var Math    = tr.find('td#MathId').attr('data-math');
                    var User    = tr.find('td#UserId').attr('data-user');
                    var Period  = $(this).attr('data-period');

                    var route = 'http://localhost:8000/note/'+Group+'/group/'+Math+'/math/'+Period+'/period';

                    //alert(route);

                    $.get(route, function (){
                    }).success(function (res){

                        if( !res.error ){
                            $('div#note').append('<div id="modalNote" class="modal"><div class="modal-content"><h4 class="center">Registrar Notas</h4> <br><br><table id="all"><thead><tr><td>Grupo</td><td>Materia</td><td>Periodo</td><td>Identificacion</td><td>Estudiante</td><td>Nota</td><td>  </td></tr></thead><tbody id="body"></tbody></table></div><div class="modal-footer"> <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat">Salir</a></div></div>');
                            $('#modalNote').openModal();
                            $(res.group.students).each(function (key){
                                $('tbody#body').append('<tr><td data-group='+res.group.id+'>'+res.group.group_name+'</td><td data-math='+res.math.id+'>'+res.math.math_name+'</td><td data-period='+res.period.id+' class="center">'+res.period.period_name+'</td><td data-student='+res.group.students[key].id+' >'+res.group.students[key].user_identity+'</td><td>'+res.group.students[key].name+' '+res.group.students[key].user_lastname+'</td><td><form id="note"><div class="input-field col l3"><input type="text" class="validate" id="valNote"><label for="valNote">Ingrese Nota</label></div></form></td><td><button class="btn-floating unlock waves-effect waves-circle AliBaba" data-id="6i" style="margin-left: 15px"><i class="fa fa-unlock"></i></button><button class="btn-floating lock waves-effect waves-circle tooltipped" style="margin-left: 15px" data-tooltip="Enviar nota" data-delay="50" data-possition="right"><i class="fa fa-plus"></i></button></td></tr>');
                                $('table#all td ').css({'padding': '0px'});
                                $('button.lock').hide();
                            })

                            $('.tooltipped').tooltip();

                            $('button.AliBaba')
                                    .click(function (){

                                var row     = $(this).parents('tr');
                                var group   =   row.find('td:nth-child(1)').attr('data-group');
                                var math    =   row.find('td:nth-child(2)').attr('data-math');
                                var period  =   row.find('td:nth-child(3)').attr('data-period');
                                var student =   row.find('td:nth-child(4)').attr('data-student');
                                var note    =   row.find('td input#valNote').val();

                                if(note != ""){ $(this).hide(); row.find('td button.lock').show(); row.find('td input#valNote').attr('disabled', true); row.find('td input#valNote').css({'border-style-type': 'dotted', 'border-color': 'grey'})}
                                else {row.find('td input#valNote').css({'border-style-type': 'dotted', 'border-color': 'red'})}

                                })

                            $('button.lock').click(function () {
                                var row     = $(this).parents('tr');
                                var group   =   row.find('td:nth-child(1)').attr('data-group');
                                var math    =   row.find('td:nth-child(2)').attr('data-math');
                                var period  =   row.find('td:nth-child(3)').attr('data-period');
                                var student =   row.find('td:nth-child(4)').attr('data-student');
                                var note    =   row.find('td form input').val();
                                var token   =   $('#token').val();
                                //var route   = 'http://localhost:8000/user/'+student+'/group/'+group+'/math/'+math+'/period/'+period+'/save';
                                var route   = 'http://localhost:8000/user/'+student+'/group/'+group+'/save';
                                alert(route + " " + note);

                                $.ajax({
                                    url:        route,
                                    headers:    {'X-CSRF-TOKEN': token},
                                    dataType:   'json',
                                    type:       'POST',
                                    data:       {'note': note},
                                    success: function (res){
                                        Materialize.toast(res.msn, 10000);
                                    }, fail: function (){
                                        alert('Fallo el guardado de los datos');
                                    }
                                });


                            })

                        }else {
                            alert(res.error);
                            window.location.href = 'http://localhost:8000/profile/'+User+'';
                        }
                    }).fail(function (res){
                        alert('Falló la consulta');
                    });

                });

            });
        </script>

</body>
</html>