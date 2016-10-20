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
                                <button class="btn-floating waves-circle lime accent-2 tooltiped modal-trigger editPeriod" data-target="modalEditPeriod" data-id="{{$period->id}}" data-position="bottom" data-delay="50" data-tooltip="Editar">
                                    <i class="fa fa-edit" style="color:black"></i>
                                </button>
                            </li>

                            <li data-id="{{$period->id}}" style="display: inline-block; padding-left: 10px">
                                <a href="{{route('destroy', $period->id)}}" class="btn-floating waves-circle deep-orange darken-1 tooltiped delete" data-position="bottom" data-delay="50" data-tooltip="Eliminar">
                                    <i class="fa fa-times-circle" style="color:white"></i>
                                </a>
                            </li>
                            <li class="right" data-id="{{$period->id}}" style="display: inline-block; padding-left: 10px">
                                @if(!$period->period_state == 0)
                                    <button class="btn-floating waves-circle white tooltiped " data-tooltip="Activo" data-delay="50" data-position="right">
                                        <i class="fa fa-thumbs-up " style="color:#4caf50 "></i>
                                    </button>
                                @else
                                    <button class="btn-floating waves-circle white tooltiped" data-tooltip="Inactivo" data-delay="50" data-position="right">
                                        <i class="fa fa-thumbs-down" style="color:#bdbdbd " ></i>
                                    </button>
                                @endif
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @include('dashboard.views.periods.formEdit')

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.tooltiped').tooltip();
            $('.modal-trigger').leanModal({dismissible: false});

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



        });
    </script>
 @endsection