@extends('dashboard.app')

@section('content')

    <div class="row">
        @foreach($periods as $period)
            <div class="col l4 s12 m7">
                <div class="card">
                    <div class="image" style="text-align: center">
                        {{-- <img src="{{asset('images/back.jpg')}}" class="circle" style="height: 100px; width: 100px; margin-top: 15px"> --}}
                    </div>
                    <div class="card-content center">
                        <h1>{{$period->period_name}}</h1>
                    </div>
                    <div class="card-action center">
                        <ul style="padding: 0px 20px">

                            <li data-id="{{$period->id}}" style="display: inline-block; padding-left: 10px">
                                <button class="btn-floating waves-circle white tooltiped modal-trigger editPeriod" data-target="modalEditPeriod" data-id="{{$period->id}}" data-position="bottom" data-delay="50" data-tooltip="Editar">
                                    <i class="fa fa-edit" style="color:black"></i>
                                </button>
                            </li>

                            <li data-id="{{$period->id}}" style="display: inline-block; padding-left: 10px">
                                <a href="{{route('destroyP', $period->id)}}" class="btn-floating waves-circle white tooltiped delete" data-position="bottom" data-delay="50" data-tooltip="Eliminar">
                                    <i class="fa fa-times" style="color:black"></i>
                                </a>
                            </li>
                            <li class="right" data-id="{{$period->id}}" style="display: inline-block; padding-left: 10px">
                                <form action="" id="pd">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="tokenPeriod">
                                    <input type="hidden" name="per" id="updatePeriodo">
                                    @if($period->period_state != 0)
                                        <a type="buttom" class="btn-floating waves-circle white tooltiped updatePeriodState" value="1" data-tooltip="Activo" data-delay="50" data-position="right">
                                            <i class="fa fa-thumbs-up " style="color:black "></i>
                                        </a>
                                    @else
                                        <a type="buttom" class="btn-floating waves-circle white tooltiped updatePeriodState" value="0" data-tooltip="Inactivo" data-delay="50" data-position="right">
                                            <i class="fa fa-thumbs-down" style="color:lightgray " ></i>
                                        </a>
                                    @endif
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('dashboard.views.periods.formEdit')
    @include('dashboard.views.periods.formCreatePeriod')

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.tooltiped').tooltip();
            $('.modal-trigger').leanModal({dismissible: false});


            $('a.updatePeriodState').click(function (){
                var id = $(this).parents('li').attr('data-id');
                var val = $(this).attr('value');
                var input = $('#updatePeriodo').attr('value', val);
                var token = $('#tokenPeriod').val();
                var route = "http://localhost:8000/periods/"+id+"/state";
                var data = input;

                //alert(route);

                $.ajax({
                    url: route,
                    headers: {'X-CSRF-TOKEN': token},
                    dataType: 'json',
                    type: 'PUT',
                    data: data,
                    success: function (res){
                        Materialize.toast(res.msn, 20000);
                        window.location.href = 'http://localhost:8000/dashboard/periods';
                    }, fail: function (){
                        alert('Se pudo completar la operacion');
                    }
                });
            });





            $('button.modal-trigger.editPeriod').click(function(){

                var id = $(this).parent('li').attr('data-id');
                var r  = " http://localhost:8000/periods/"+id+"/find ";

                $.get(r, function(){
                }).done(function (res){
                    $('#modalEditPeriod').openModal();
                    $('#name').val(res.msn.period_name);
                    $('button.updatePeriod').attr('data-id', res.msn.id);
                }).fail(function (){
                   alert('Fallo la consulta');
                });
            });
            $('button.updatePeriod').click(function (){
                var id          = $('button.updatePeriod').attr('data-id');
                var routeUpd    = "http://localhost:8000/periods/"+id+" ";
                var token       = $('#tokenEdit').attr('value');
                var form        = $('form#formUpdate').serialize();

                alert(form);
                $.ajax({
                    url:        routeUpd,
                    headers:    {'X-CSRF-TOKEN': token},
                    type: 		'PUT',
                    dataType:   'json',
                    data:       form,
                    success: function(res){
                        Materialize.toast(res.msn, 4000);
                        window.location.href = 'http://localhost:8000/dashboard/periods';
                    },fail: function(){
                        alert('No se completo la actualizacion de Datos');
                    }
                })

            })

            $('.createPeriod').click(function (){
                $('#modalCreatePeriod').openModal();

                $('.sendFormCreatePeriod').click(function (){
                    var rout = 'http://localhost:8000/periods/save';
                    var token= $('#tokenCreatePeriod').attr('value');
                    var data = $('#formCreatePeriod').serialize();

                    $.ajax({
                        url:        rout,
                        datatype:   'json',
                        type:       'POST',
                        headers:    {'X-CSRF-TOKEN': token},
                        data:       data,
                        success: function(res){
                            $('#modalCreatePeriod').closeModal();
                            Materialize.toast(res.msn, 10000);
                            window.location.href = 'http://localhost:8000/dashboard/periods';
                        }, fail: function(){
                            alert('Fallo el envio de datos');
                            window.location.href = 'http://localhost:8000/dashboard/periods';
                        }
                    });

                })
            });


        });
    </script>
 @endsection