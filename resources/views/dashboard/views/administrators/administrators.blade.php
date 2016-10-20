@extends('dashboard.app')

@section('content')

        <div class="row">
            @foreach($admin as $admin)
                    <div class="col l4 s12 m7">
                        <div class="card">
                            <div class="image" style="text-align: center">
                                <img src="{{asset('images/back.jpg')}}" class="circle" style="height: 100px; width: 100px; margin-top: 15px">
                            </div>
                            <div class="card-content center">
                                @role('administrator') <i class="fa fa-diamond"></i> @endrole{{$admin->name}}
                                <span> <b>{{$admin->user_lastname}}</b></span>
                                <span style="font-size: 12px"> {{$admin->email}} </span>
                                <span class="right"> @if($admin->user_state == 'enabled') <i class="fa fa-circle tooltiped circle" style="color: #4caf50;box-shadow: 2px 1px 6px 4px #00b0ff " data-position="right" data-delay="50" data-tooltip="Activo"></i> @else <i class="fa fa-circle tooltiped" style="color: #424242 " data-position="right" data-delay="50" data-tooltip="Inactivo"></i> @endif</span>
                            </div>
                            <div class="card-action center">
                                <ul style="padding: 0px 20px">
                                    <li data-id="{{$admin->id}}" style="display: inline-block; padding-left: 10px">
                                        <button class="btn-floating waves-circle lime accent-2 tooltiped edit modal-trigger" data-target="modalEdit" data-id="{{$admin->id}}" data-position="bottom" data-delay="50" data-tooltip="Editar">
                                            <i class="fa fa-edit" style="color:black"></i>
                                        </button>
                                    </li>

                                    <li data-id="{{$admin->id}}" style="display: inline-block; padding-left: 10px">
                                        <button class="btn-floating waves-circle blue lighten-4 tooltiped profile" data-position="bottom" data-delay="50" data-tooltip="Ver Perfil">
                                            <i class="fa fa-eye" style="color:black"></i>
                                        </button>
                                    </li>

                                    <li data-id="{{$admin->id}}" style="display: inline-block; padding-left: 10px">
                                        <button class="btn-floating waves-circle deep-orange darken-1 tooltiped delete" data-position="bottom" data-delay="50" data-tooltip="Eliminar">
                                            <i class="fa fa-times-circle" style="color:white"></i>
                                        </button>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>

        <div id="create">
            @include('dashboard.views.administrators.formCreate')
        </div>

        <div id="edit">
            @include('dashboard.views.administrators.formEdit')
        </div>

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.tooltiped').tooltip();
            $('.modal-trigger').leanModal({dismissible: false});
            $('select').material_select();


            $('.modal-trigger.create').click(function(){
                $(this).parent('a').removeClass('collapsible-header');
                $('#modalCreate').openModal();

                $('button.crear').click(function (){
                    var routeSave = 'http://localhost:8000/admins/save';
                    var data    = $('#formCreate').serialize();
                    var token   = $('#tokenC').attr('value');

                    $.ajax({
                        url: routeSave,
                        type: 'POST',
                        headers: 	{ 'X-CSRF-TOKEN': token },
                        dataType: 	'json',
                        data:        data,
                        success: function(res) {
                            alert('Registro exitoso');
                            window.href.location = 'http://localhost:8000/admins';
                        },
                        fail: function (){
                            alert('No se completo el registro');
                        }
                    });
                });
            });

            $('button.modal-close').click(function (){
                $('a.menu').addClass('collapsible-header');
            });
            $('ul#type input').each(function (){
                var id = $(this).attr('value');
                $(this).click(function (){
                  if(id == 3) {
                      $('select#user_type').append($("<option value='TI'> Tarjeta de Identidad </option> <option value='RC'> Registro Civil </option>"));
                      $('select#user_type').material_select();
                  }
                })
            })

            $('.modal-trigger.edit').click(function(){
                var id = $(this).parent('li').attr('data-id');
                var r  = " http://localhost:8000/admins/find/"+id+ " ";

                $.get(r, function(){
                }).done(function (res){
                    $('#modalEdit').openModal();
                    $('#identity').val(res.user.user_identity);
                    $('#name').val(res.user.name);
                    $('#lastname').val(res.user.user_lastname);
                    $('#email').val(res.user.email);

                    $('#genre option').each(function(){
                            if($(this).val() == res.user.user_genre ) {
                                $(this).attr('selected', true);
                                if (res.user.user_genre == 'M') {
                                    $(this).text('Hombre');
                                } else {
                                    $(this).text('Hombre');
                                }
                            }
                    });

                    $('#birthday').val(res.user.user_birthday);
                    $('#age').val(res.user.user_age);
                    $('#address').val(res.user.user_address);
                    $('#phone').val(res.user.user_phone);
                    $('#blood').val(res.user.user_blood);

                    if(res.user.user_state == 'enabled'){
                        $('#active').attr('checked', true);
                    }else{
                        $('#disabled').attr('checked', true);
                    }

                    $('#profession').val(res.user.user_profession);
                    $('button.update').attr('data-id', res.user.id);

                    /*$('#city').val(res.user.town.town_name);
                    $(res.dept).each(function(key){
                        $('select#dept').append($('<option></option>').attr('value', res.dept[key].id).text(res.dept[key].dept_name));
                        $('select#dept').material_select();
                    });*/

                }).fail(function(){
                    alert('No se envio nada');
                });
            });
            $('button.update').click(function(){
                var id      = $(this).attr('data-id');
                var route   = "http://localhost:8000/admins/find/"+id+"/update";
                var form    = $('#formEdit').serialize();
                var token   = $('#token').attr('value');

                $.ajax({
                    url: route,
                    headers: 	{ 'X-CSRF-TOKEN': token },
                    type: 		'PUT',
                    dataType: 	'json',
                    data:        form,
                    success: function(res){
                       if(res.msn != null){
                           alert('Datos actualizados correctamente');
                           window.location.href = 'http://localhost:8000/admins';
                       }
                    }
                })

            });

        });
    </script>
@endsection