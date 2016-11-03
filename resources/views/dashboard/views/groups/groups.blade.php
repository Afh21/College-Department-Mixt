@extends('dashboard.app')

@section('content')
    @if($group->count() > 0)
        <div class="row">
            <div class="col l12">
                <table class="bordered">
                    <thead>
                    <tr>
                        <th data-field="id">    Codigo</th>
                        <th data-field="name">  Grupo</th>
                        <th data-field="cant">  Cantidad</th>
                        <th data-field="peirod">Jornada</th>
                        <th data-field="assig">¿Asignado?</th>
                        <th data-field="direc" class="center">¿Director de Grupo?</th>
                        <th data-field="math" class="center">Materias</th>
                    </tr>
                    </thead>
                    <style>
                        td { padding: 0px; }
                    </style>
                    <tbody>
                    @foreach($group as $group)
                        <tr data-id="{{$group->id}}">

                            <td class="center">
                                <span class="chip"> {!! $group->group_code !!} </span>
                            </td>
                            <td class="center">
                                <span class="chip"> {!! $group->group_name !!} </span>
                            </td>
                            <td class="center">
                                <span class="chip"> {!! $group->group_quantity!!}</span>
                            </td>
                            <td class="center">
                                @if($group->group_jornade == 'AM')
                                    <button class="btn-floating white tooltiped" data-tooltip="{{$group->group_jornade}}" data-delay="50" data-possition="top">
                                        <i class="fa fa-sun-o" style="color:#ffb300"></i> </button>
                                @else
                                    <button class="btn-floating white tooltiped" data-tooltip="{{$group->group_jornade}}" data-delay="50" data-possition="top">
                                        <i class="fa fa-moon-o" style="color:#757575"></i> </button>
                                @endif
                            </td>
                            <td class="center">
                                @if($group->group_assigned == 0)
                                    <button class="btn-floating white">
                                        <i class="fa fa-thumbs-o-down" style="color:grey"></i></button>
                                @else
                                    <button class="btn-floating white">
                                        <i class="fa fa-thumbs-up" style="color:grey"></i></button>
                                @endif
                            </td>


                                <td class="center">
                                    @if($group->user_teacher_director == null)
                                        <button class="btn-floating white tooltiped" data-tooltip="Disponible para asignacion" data-delay="50" data-possiton="buttom">
                                            <i class="fa fa-info" style="color:black"></i> </button>
                                    @else
                                        <span class="chip">{!! $group->director->name !!} {!! $group->director->user_lastname !!}</span>
                                    @endif
                                </td>


                            <style>.chip.math{padding: 0px 6px;}</style>



                                <td class="center">
                                    @if($group->GroupMaths()->count() > 0 )
                                         @foreach($group->GroupMaths as $maths)
                                           <span class="chip math"> {!! $maths->math_code !!} - {!! $maths->math_name !!} </span>
                                         @endforeach
                                    @endif
                                </td>


                            <td>
                                <ul>
                                    <li style="display: inline-flex;" data-id="{{$group->id}}">
                                        <button class="btn-floating white waves-effect waves-circle tooltiped modal-trigger updateGroup" data-target="modalEditGroup"data-id="{{$group->id}}" data-tooltip="Editar" data-position="bottom" data-delay="50">
                                            <i class="fa fa-edit" style="color: black; font-size: 18px "></i> </button>
                                    </li>
                                    <li  style="display: inline-flex;">
                                        <a href="{{route('groups.destroy', $group->id)}}" class="btn-floating waves-effect waves-circle white tooltiped" data-id="{{$group->id}}" data-tooltip="Eliminar" data-position="bottom" data-delay="50">
                                            <i class="fa fa-trash-o" style="color: red; font-size: 18px "></i> </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    @include('dashboard.views.groups.formCreateGroup')
    @include('dashboard.views.groups.formEditGroup')

@endsection

@section('js')
    <script>
        $(document).ready(function (){

            $('.modal-trigger').leanModal({dismissible: false});
            $('.tooltiped').tooltip();
            $('select').material_select();
            $('.chips').material_chip();
            $('.updateMathfromGroupAgain').hide();
            $('.updateJornadeAgain').hide();

            $('.createGroup').click(function (){
                $('#modalCreateGroup').openModal();
            });

            $.get('http://localhost:8000/groups/maths', function (){
            }).done(function (res){
                $(res.msn).each(function (key){
                    $('select#mathsGroups').append("<option value="+res.msn[key].id+"> "+ res.msn[key].math_code +"  "+ res.msn[key].math_name+" </option>");
                });
                $('select#mathsGroups').material_select();
            }).fail(function (res){
                alert('Fallo la consulta');
            });

            $('.sendFormCreateGroup').click(function () {
                var route = 'http://localhost:8000/groups/save';
                var data = $('#formCreateGroup').serialize();
                var token= $('#tokenCreateGroup').val();

                $.ajax({
                    url: route,
                    dataType: 'json',
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'POST',
                    data: data,
                    success: function(res){
                        Materialize.toast(res.msn, 10000);
                        $('#modalCreateGroup').closeModal();
                        window.location.href= 'http://localhost:8000/dashboard/groups';
                    }
                })
            });

            $('.modal-trigger.updateGroup').click(function (){
                var id = $(this).parent('li').attr('data-id');
                var ro = "http://localhost:8000/groups/"+id+"/find ";

              $.get(ro, function(){
              }).done(function (res){
                  $('#modalEditGroup').openModal();
                  $('#updcode').focus().val(res.msn.group_code);
                  $('#updname').focus().val(res.msn.group_name);
                  $('li#editGroup').attr('data-id', res.msn.id);
                  $('div#jornada span').append(res.msn.group_jornade);
                  $(res.math).each(function (key){
                      $('div#math').append("<span class='chip'> "+res.math[key].math_code+" - "+res.math[key].math_name+"</span>");
                  })
                  $('.updateMathfromGroup').click(function (){
                      $(this).hide();
                      $('.updateMathfromGroupAgain').show();
                      $('div.mathsList').show();
                  })

                  $('.updateJornade').click(function (){
                      $(this).hide();
                      $('.updateJornadeAgain').show();
                      $('#updJornade').show();
                  })

              }).fail(function (){
                  alert('Fallo la consulta');
              })


                $(".updateMathfromGroupAgain").click(function (){
                    $('div.mathsList').hide();
                    $(this).hide();
                    $('.updateMathfromGroup').show();
                })
                $('.updateJornadeAgain').click(function (){
                    $(this).hide();
                    $('.updateJornade').show();
                    $('#updJornade').hide();
                })
            })

            $('.sendFormEditGroup').click(function (){
                var id = $(this).parent('li').attr('data-id');
                var ro = "http://localhost:8000/groups/"+id+" ";
                var data = $('#formEditGroup').serialize();
                var token= $('#tokenEditGroup').val();

                $.ajax({
                    url: ro,
                    dataType: 'json',
                    type: 'PUT',
                    headers: {'X-CSRF-TOKEN': token},
                    data: data,
                    success: function(res){
                        Materialize.toast(res.msn, 10000);
                        $('#modalEditGroup').closeModal();
                        window.location.href = 'http://localhost:8000/dashboard/groups';
                    }
                })
            })

            $('.modal-close').click(function (){
                window.location.href = 'http://localhost:8000/dashboard/groups';
            })


        })// Fin document.ready
    </script>
@endsection
























