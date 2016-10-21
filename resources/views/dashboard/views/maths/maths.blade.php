@extends('dashboard.app')

@section('content')
    @if($math->count() > 0)

        <div class="row">
            <div class="col l9 push-l1">
                <table class="bordered">
                    <thead>
                    <tr>
                        <th data-field="id">Codigo</th>
                        <th data-field="name">Nombre</th>
                    </tr>
                    </thead>
                    <style>
                        td {
                            padding: 0px;
                        }
                    </style>
                    <tbody>
                        @foreach($math as $math)
                            <tr data-id="{{$math->id}}">
                                <td>{!! $math->math_code !!}</td>
                                <td>{!! $math->math_name !!}</td>
                                <td>
                                    <ul>
                                        <li style="display: inline" data-id="{{$math->id}}">
                                            <button class="btn-floating lime accent-2 waves-effect waves-circle tooltiped modal-trigger updateMath" data-target="modalEditMath"data-id="{{$math->id}}" data-tooltip="Editar" data-position="bottom" data-delay="50">
                                                <i class="fa fa-edit" style="color: black"></i> </button>
                                        </li>
                                        <li  style="display: inline; padding-left: 20px">
                                            <a href="{{route('destroy', $math->id)}}" class="btn-floating waves-effect waves-circle deep-orange darken-1 tooltiped" data-id="{{$math->id}}" data-tooltip="Eliminar" data-position="bottom" data-delay="50">
                                                <i class="fa fa-times" style="color: white"></i> </a>
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

    @include('dashboard.views.maths.formCreateMath')
    @include('dashboard.views.maths.formEditMath')
@endsection

@section('js')
    <script>
        $('.tooltiped').tooltip();
        $('.modal-trigger').leanModal({dismissible: false});

        $('button.createMath').click(function () {
            $('#modalCreateMath').openModal();

            $('.sendFormCreateMath').click(function () {
                var rout = 'http://localhost:8000/maths/save';
                var token = $('#tokenCreateMath').attr('value');
                var data = $('#formCreateMath').serialize();

                $.ajax({
                    url: rout,
                    datatype: 'json',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': token},
                    data: data,
                    success: function (res) {
                        $('#modalCreateMath').closeModal();
                        Materialize.toast(res.msn, 20000);
                        $('#modalCreateMath').closeModal();
                        window.location.href = 'http://localhost:8000/dashboard/maths';
                    }, fail: function () {
                        alert('Fallo el envio de datos');
                        window.location.href = 'http://localhost:8000/dashboard/maths';
                    }

                })
            })
        })

        $('button.modal-trigger.updateMath').click(function (){

            var id = $(this).parent('li').attr('data-id');
            var rou= "http://localhost:8000/maths/"+id+"/find ";

            $.get(rou, function (){
            }).done(function (res){
                $('#modalEditMath').openModal();
                $('#updcode').val(res.msn.math_code);
                $('#updname').val(res.msn.math_name);
                $('li#idMath').attr('data-id', res.msn.id);
            }).fail(function () {
                alert('Fallo consulta');
            });
        })

        $('.sendFormUpdateMath').click(function (){

            var id = $(this).parent('li').attr('data-id');
            var data = $('#formEditMath').serialize();
            alert(id);
        })

    </script>
@endsection