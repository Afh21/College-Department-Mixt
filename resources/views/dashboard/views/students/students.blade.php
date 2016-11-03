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

    <div class="row">
        <div class="container">

            <div class="col l12 center" style="margin-top: 4em">
                <span style="font-size: 5em">{{$user->name}}</span> &nbsp; <span style="font-size: 3em">{{$user->user_lastname}}</span>
            </div>

            <div class="col l12 center" style="margin-top: 5em">
                <button class="btn-floating btn-large white groupId" data-group="{!!  $user->group->id !!}" style="color: black"> {!! $user->group->group_name !!} </button>
            </div>

            <div class="col l12" style="margin-top: 5em">
                <div class="col l6">
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

                <div class="col l4 center">
                    <h5 class="center"> Periodos </h5>
                    @foreach($period as $period)
                        <ul style ="display: inline-block">
                            <li data-student="{!! $user->id !!}" >
                                <button class="btn-floating btn-large waves-effect waves-circle seek modal-trigger " data-period="{!! $period->period_id !!}" style="margin: 5px 5px" data-target="modalNote"> {{$period->period_id}} </button>
                            </li>
                        </ul>

                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div id="modalNote" class="modal">
        <div class="modal-content">
            <h4 class="center" style="margin-bottom: 50px">PERIODO - <span id="p"></span> </h4>
            <table>
                <thead>
                <tr>
                    <td> Materia </td>
                    <td> Periodo </td>
                    <td> Nota    </td>
                </tr>
                </thead>
                <tbody>

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
                    var route   = 'http://localhost:8000/student/'+student+'/group/'+group+'/period/'+period+'/notes';

                    alert(route);

                    $.get(route, function (){
                    }).success(function (res) {
                        $('#modalNote').openModal();
                        $('span#p').append(period);
                        $(res.msn).each(function (key){
                            $('table tbody').append('<tr id="id" data-student='+res.msn[key].id+'><td>'+res.msn[key].math_name+'</td><td>'+res.msn[key].period_name+'</td><td>'+res.msn[key].note+'</td></tr>');
                        });
                    }).fail(function (){

                    });
                });

                $('.modal-close').click(function () {
                    var student = $('tr#id').attr('data-student');
                    window.location.href = 'http://localhost:8000/student/'+student+'';
                })
            })
        </script>

</body>
</html>