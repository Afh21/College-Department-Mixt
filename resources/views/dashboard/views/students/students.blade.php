<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | {{$user->name}}</title>

    @include('layouts.links.css')
</head>
<body>

    <div class="row" style="margin-top: 1em">
        <div class="container">

            <div class="col l12 center" style="margin-top: 2em">
                <h1 style="margin-top: 0px"> <i class="fa fa-child"></i> </h1>
                <span style="font-size: 5em">{{$user->name}}</span> &nbsp; <span style="font-size: 3em">{{$user->user_lastname}}</span>
            </div>

            <div class="col l12 center" style="margin-top: 1em">
                <button class="btn-floating btn-large white groupId" data-group="{!!  $user->group->id !!}" style="color: black"> {!! $user->group->group_name !!} </button>
            </div>

            <div class="col l12" style="margin-top: 5em">
                <div class="col l6">
                    <p class="center" style="font-size: 1.2em; "> Datos personales  </p>
                    <hr>
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
                </div>

                <div class="col l6 center">
                    <p class="center" style="font-size: 1.2em; "> Consultar notas </p>
                    <hr>
                        <ul style ="display: inline-block" id="info">
                            <li data-student="{!! $user->id !!}" id="studentxx">
                                <button class="btn-floating btn-large waves-effect waves-circle seek modal-trigger " style="margin: 5px 5px" data-target="modalNote"> <i class="fa fa-search"></i> </button>
                            </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>


    <div id="modalNote" class="modal">
        <div class="modal-content">
            <h4 class="center" style="margin-bottom: 50px">Notas <span id="p"></span> </h4>
            <table class="striped" id="encabezado">
                <thead>
                <tr>
                    <td> Materia  </td>
                    <td id="I"> I </td>
                    <td id="II"> II </td>
                    <td id="III"> III </td>
                    <td id="IV"> IV </td>
                    <td> Consultar </td>
                </tr>
                </thead>
                <tbody id="cuerpo">

                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button class=" modal-action modal-close waves-effect waves-green btn-flat">Salir</button>
        </div>
    </div>


    @include('layouts.links.js')
    @yield('js')

        <script>
            $(document).ready(function () {
                $('.modal-trigger').leanModal({dismissible: false});

                $('button.modal-trigger.seek').click(function () {
                    var group   = $('button.groupId').attr('data-group');
                    var student = $(this).parent('li').attr('data-student');
                    var period  = $(this).attr('data-period');
                    var student = $('li#studentxx').attr('data-student');
                    var route   = 'http://localhost:8000/group/'+group+'/student/'+student+'/notes';

                    $.get(route, function (){
                    }).success(function (res) {
                        $('#modalNote').openModal();

                        $(res.msn).each(function (key){
                            $('table tbody').append('<tr data-student='+student+' data-math='+res.msn[key].id+'> <td id="MathName"> '+ res.msn[key].math_name +'</td> <td id="I" value=1> </td> <td id="II" value="2"> </td> <td id="III" value="3"> </td> <td id="IV" value="4"> </td> <td> <button class="btn-floating white searchNote"><i class="fa fa-plus" style="color:black"></i></button></td> </tr>');
                        });

                        $('.searchNote').click(function (){
                            var row = $(this).parents('tr');
                            var idMath = row.attr('data-math');
                            var idStudent = row.attr('data-student');
                            var pp = row.find('td#I').attr('value');
                            var sp = row.find('td#II').attr('value');
                            var tp = row.find('td#III').attr('value');
                            var cp = row.find('td#IV').attr('value');
                            var pper = 'http://localhost:8000/math/'+idMath+'/period/'+pp+'/student/'+idStudent+'/notas ';
                            var sper = 'http://localhost:8000/math/'+idMath+'/period/'+sp+'/student/'+idStudent+'/notas ';
                            var tper = 'http://localhost:8000/math/'+idMath+'/period/'+tp+'/student/'+idStudent+'/notas ';
                            var cper = 'http://localhost:8000/math/'+idMath+'/period/'+cp+'/student/'+idStudent+'/notas ';

                            $.get(pper, function (){
                            }).success(function (res){
                                res.note != null ? row.find('td#I').append(res.note.note) : row.find('td#I').append(0) ;
                                row.find('td button.searchNote').attr('disabled', true);
                            }).fail(function (){ alert('No se pudo ejecutar la consulta'); });

                            $.get(sper, function (){
                            }).success(function (res){
                                res.note != null ? row.find('td#II').append(res.note.note) : row.find('td#II').append(0) ;
                            }).fail(function (){ alert('No se pudo ejecutar la consulta'); });

                            $.get(tper, function (){
                            }).success(function (res){
                                res.note != null ? row.find('td#III').append(res.note.note) : row.find('td#III').append(0) ;
                            }).fail(function (){ alert('No se pudo ejecutar la consulta'); });

                            $.get(cper, function (){
                            }).success(function (res){
                                res.note != null ? row.find('td#IV').append(res.note.note) : row.find('td#IV').append(0) ;
                            }).fail(function (){ alert('No se pudo ejecutar la consulta'); });

                        });



                    }).fail(function (){ });

                });




                $('.modal-close').click(function () {
                    var student = $('li#studentxx').attr('data-student');
                    window.location.href = 'http://localhost:8000/student/'+student+'';
                });


            })
        </script>

</body>
</html>