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


        <div class="{{$user->is('administrator') ? "col l5 push-l4" : "col l5" }}" style="margin-top: 50px">

            <div class="col l12">
                <p class="center"> <b> Datos Personales </b> <hr> </p>
                <div class="col l6">
                    <ul>
                        <li>
                            <span class="chip"> <i class="fa fa-hashtag"></i> </span> <span class="chip"> {!! $user->user_identity !!} </span>
                        </li>
                        <li>
                            <span class="chip"> <i class="fa fa-envelope-o"></i> </span> <span class="chip"> {!! $user->email !!} </span>
                        </li>
                        <li>
                            @if($user->user_genre == 'F') <span class="chip">  <i class="fa fa-venus"></i></span> <span class="chip"> Femenino </span> @else <span class="chip"> <i class="fa fa-mars"></i> </span> <span class="chip"> Masculino </span> @endif
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


                @if($user->is('teacher') || $user->is('student') )
                <div class="col l12">
                    <p class="center"> <b> Datos academicos </b>
                    <hr></p>
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
                    @if($user->id != Auth::user()->id)
                        <th data-field="period"> Periodos (Habilitados / Deshabilitados) </th>
                    @endif
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
                                            <td>
                                                <!-- Si el usuario autenticado es igual al usuario que se ve  RECORDAR CAMBIAR EL != x == -->

                                                @if($user->id != Auth::user()->id)  <!-- ...... RECORDARSE .... -->
                                                    @foreach($materiasProfesor->periods as $period)
                                                        @if($period->period_state == 0)
                                                            <button class="btn-floating waves-effect waves-circle tooltipped" disabled data-period="{!! $period->id !!}" data-tooltip="Deshabilitado" data-delay="50" data-position="left">{!! $period->period_name !!}</button>
                                                        @else
                                                            <button class="btn-floating waves-effect waves-circle tooltipped modal-trigger AskGroup" data-target="modalNote"  data-period="{!! $period->id !!}" data-group="{!! $gruposProfesor->id !!}" data-tooltip="Habilitado" data-delay="50" data-position="right">{!! $period->period_name !!}</button>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <a href="{{route('dashboard')}}" class="btn btn-large waves-effect">
                                                        <i class="fa fa-rotate-left left" style="color: black"></i>  Ir a Usuarios</a>
                                                @endif
                                            </td>
                                        </tr>

                                @endif
                        @endforeach
                    @endforeach
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
    @endif
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
                    var Period  = $(this).attr('data-period');
                    //var Teacher = tr.find('td#UserId').attr('data-user');

                    var route = 'http://localhost:8000/group/'+Group+'/math/'+Math+'/period/'+Period+'/find';

                    $.get(route, function (){
                    }).success(function (res){

                        if( !res.error ){
                            $('div#note').append('<div id="modalNote" class="modal"><div class="modal-content"><h4 class="center">Registrar Notas</h4> <br><br><table id="all"><thead><tr><td>Grupo</td><td>Materia</td><td>Periodo</td><td>Identificacion</td><td>Estudiante</td><td>Nota</td><td>  </td></tr></thead><tbody id="body"></tbody></table></div><div class="modal-footer"> <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat">Salir</a></div></div>');
                            $('#modalNote').openModal();
                            $(res.group.students).each(function (key){
                                $('tbody#body').append('<tr data-teacher="{!! $user->id !!}"><td data-group='+res.group.id+'>'+res.group.group_name+'</td><td data-math='+res.math.id+'>'+res.math.math_name+'</td><td data-period='+res.period.id+' class="center">'+res.period.period_name+'</td><td data-student='+res.group.students[key].id+' >'+res.group.students[key].user_identity+'</td><td>'+res.group.students[key].name+' '+res.group.students[key].user_lastname+'</td><td><form id="note"><div class="input-field col l3"><input type="text" disabled class="validate" id="valNote" ></div></form></td><td><button class="btn-floating waves-effect waves-circle Begin tooltipped" style="margin-left: 15px " data-tooltip="Click aqui" data-possition="right" data-delay="50"><i class="fa fa-lock"></i></button><button class="btn-floating waves-effect waves-circle AliBaba" style="margin-left: 15px"><i class="fa fa-unlock"></i></button><button class="btn-floating waves-effect waves-circle tooltipped Finished" style="margin-left: 15px" data-tooltip="Enviar nota" data-delay="50" data-possition="right"><i class="fa fa-plus"></i></button> <button class="btn-floating waves-effect waves-effect waves-circle Update tooltipped" style="margin-left: 15px" data-tooltip="Actualizar nota" data-possition="right" data-delay="50" ><i class="fa fa-refresh"></i></button>  </td></tr>');
                                $('table#all td ').css({'padding': '0px'});

                                $('button.Finished').hide();
                                $('button.AliBaba').hide();
                                $('button.Update').hide();

                            });

                            $('.tooltipped').tooltip();


                            // Pregunta si el estudiante tiene nota
                            $('button.Begin').click(function (){
                                var row     = $(this).parents('tr')
                                var group   =   row.find('td:nth-child(1)').attr('data-group');
                                var math    =   row.find('td:nth-child(2)').attr('data-math');
                                var period  =   row.find('td:nth-child(3)').attr('data-period')
                                var student =   row.find('td:nth-child(4)').attr('data-student');

                                var route = 'http://localhost:8000/user/'+student+'/group/'+group+'/math/'+math+'/period/'+period+'/find';

                                $.get(route, function (){
                                }).success(function (res){
                                    if(res.note == null ){
                                        row.find('td input#valNote').append('<label for="valNote">Ingrese Nota</label>');
                                        row.find('td input#valNote').attr('disabled', false).focus();
                                        row.find('td button.Begin').hide();
                                        row.find('td button.AliBaba').show();
                                    }else{
                                        row.find('td button.Begin').hide();
                                        row.find('td button.Update').show();
                                        row.find('td input#valNote').focus().val(res.note.note).css({'text-align': 'center'});

                                        row.find('td button.Update').click(function (){
                                            row.find('td input#valNote').focus().attr('disabled', false);
                                        });

                                        row.find('td button.Update').dblclick(function (){
                                            var input = row.find('td input#valNote');
                                            if(input.val() == ""){
                                                alert('Este campo no debe estar vacío');
                                            }
                                            else {
                                                //Actualiza la nota
                                                var teacher = $(this).parents('tr').attr('data-teacher');
                                                var route = 'http://localhost:8000/teacher/'+teacher+'/user/'+student+'/group/'+group+'/math/'+math+'/period/'+period+'/update';
                                                var note    =   row.find('td form input').val();
                                                var token   =   $('#token').val();
                                                //alert(route);

                                                $.ajax({
                                                    url:        route,
                                                    headers:    {'X-CSRF-TOKEN': token},
                                                    dataType:   'json',
                                                    data:       {'note': note},
                                                    type:       'PUT',
                                                    success: function (res){
                                                        Materialize.toast(res.msn, 10000);
                                                        row.find('td form input').attr('disabled', true);
                                                        row.find('td button.Update').hide();
                                                        row.find('td button.Begin').show();

                                                        //window.location.href = 'http://localhost:8000/profile/'+teacher+'';
                                                    }
                                                })
                                            }
                                        });
                                    }



                                }).fail(function (){
                                   alert('Fallo la consulta');
                                });

                            });

                            //Valida que el input tenga algun valor
                            $('button.AliBaba').click(function (){
                                var row     = $(this).parents('tr');
                                var note    =   row.find('td input#valNote').val();
                                if(note != ""){
                                    $(this).hide();
                                    row.find('td button.Finished').show();
                                    row.find('td input#valNote').attr('disabled', true);
                                    row.find('td input#valNote').css({'border-style-type': 'dotted', 'border-color': 'grey'})
                                }
                                else {
                                    row.find('td input#valNote').css({'border-style-type': 'dotted', 'border-color': 'red'})
                                }
                            });

                            // Almacena la nota
                            $('button.Finished').click(function () {
                                var row     = $(this).parents('tr');
                                var teacher = $(this).parents('tr').attr('data-teacher');
                                var group   =   row.find('td:nth-child(1)').attr('data-group');
                                var math    =   row.find('td:nth-child(2)').attr('data-math');
                                var period  =   row.find('td:nth-child(3)').attr('data-period');
                                var student =   row.find('td:nth-child(4)').attr('data-student');
                                var note    =   row.find('td form input').val();
                                var token   =   $('#token').val();
                                //var route   = 'http://localhost:8000/user/'+student+'/group/'+group+'/math/'+math+'/period/'+period+'/save';
                                var route   = 'http://localhost:8000/teacher/'+teacher+'/user/'+student+'/group/'+group+'/math/'+math+'/period/'+period+'/save';
                                //alert(route + " " + note);

                                $.ajax({
                                    url:        route,
                                    headers:    {'X-CSRF-TOKEN': token},
                                    dataType:   'json',
                                    type:       'POST',
                                    data:       {'note': note},
                                    success: function (res){
                                        Materialize.toast(res.msn, 10000);
                                        ///window.location.href = 'http://localhost:8000/profile/'+teacher+'';
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