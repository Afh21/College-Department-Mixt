@extends('dashboard.app')

@section('content')

    <div class="row">

        <div class="col l4">
            <div class="card">
                <div class="card-image">
                    <img src="images/users.png">
                </div>
                <div class="card-content center">
                    <ul>
                        <li style="display: inline">
                            <button class="btn-floating tooltiped" data-tooltip="{!! $admin !!} administrador(es)" data-possition="buttom" data-delay="50">
                                <i class="fa fa-diamond"></i> </button>
                        </li>
                        <li style="display: inline">
                            <button class="btn-floating tooltiped" data-tooltip="{!! $teacher !!} profesor(es)" data-possition="buttom" data-delay="50">
                                <i class="fa fa-graduation-cap"></i> </button>
                        </li>
                        <li style="display: inline">
                            <button class="btn-floating tooltiped" data-tooltip="{!! $student !!} estudiante(s)" data-possition="buttom" data-delay="50">
                                <i class="fa fa-child"></i> </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col l4">
            <div class="card">
                <div class="card-image">
                    <img src="images/grupos.png">
                </div>
                <div class="card-content center">
                    <ul>
                        <li>
                            <button class="btn-floating tooltiped" data-tooltip="{!! $group !!} grupo(s)" data-possition="buttom" data-delay="50">
                                <i class="fa fa-navicon"></i> </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col l4">
            <div class="card">
                <div class="card-image">
                    <img src="images/materias.png">
                </div>
                <div class="card-content center">
                    <ul>
                        <li>
                            <button class="btn-floating tooltiped" data-tooltip="{!! $math !!} materia(s)" data-possition="buttom" data-delay="50">
                                <i class="fa fa-newspaper-o"></i> </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="col l4">
            <div class="card">
                <div class="card-image">
                    <img src="images/periodos.png">
                </div>
                <div class="card-content center">
                    <button class="btn-floating tooltiped" data-tooltip="{!! $periodos !!} periodo(s)" data-possition="buttom" data-delay="50">
                        <i class="fa fa-archive"></i> </button>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('js')
    <script>
        $('.tooltiped').tooltip();
    </script>
@endsection