@extends('dashboard.app')

@section('content')
    <div class="row">

        <table class="table-hovered">
            <thead>
            <tr>
                <td>Tipo</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>Correo Electronico</td>
                <td>Grupo</td>
                <td></td>
            </tr>
            </thead>
            <tbody>

            @foreach($admin as $admin)
                @foreach($admin->roles as $role)
                    @if($role->slug == 'student')
                        <tr>
                            <td>
                                @foreach($admin->roles as $role)
                                    @if($role->slug == 'administrator')
                                        <button class="btn btn-floating white tooltiped" data-tooltip="Administrador" data-delay="50" data-possition="buttom">
                                            <i class="fa fa-diamond" style="color:#00b8d4"></i>
                                        </button>
                                    @elseif($role->slug == 'teacher')
                                        <button class="btn btn-floating white tooltiped" data-tooltip="Profesor" data-delay="50" data-possition="buttom">
                                            <i class="fa fa-graduation-cap" style="color:#00897b "></i>
                                        </button>
                                    @else
                                        <button class="btn btn-floating white tooltiped" data-tooltip="Estudiante" data-delay="50" data-possition="buttom">
                                            <i class="fa fa-child" style="color:#bcaaa4"></i>
                                        </button>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {!! $admin->name !!}
                            </td>
                            <td>
                                {!! $admin->user_lastname !!}
                            </td>
                            <td>
                                {!! $admin->email !!}
                            </td>

                            <td>
                                    <span class="chip" style="color: black">{!! $admin->group->group_name !!}</span>
                            </td>

                            <td>
                                <ul style="padding: 0px 3px">
                                    <li data-id="{{$admin->id}}" style="display: inline-block; padding-left: 3px">
                                        <button class="btn-floating waves-circle white tooltiped edit modal-trigger" data-target="modalEdit" data-id="{{$admin->id}}" data-position="bottom" data-delay="50" data-tooltip="Editar">
                                            <i class="fa fa-edit" style="color:black"></i>
                                        </button>
                                    </li>

                                    <li data-id="{{$admin->id}}" style="display: inline-block; padding-left: 3px">
                                        @if($admin->is('teacher') || $admin->is('administrator') )
                                            <a href="{{route('user.show', $admin->id)}}" class="btn-floating waves-circle white tooltiped profile" data-position="bottom" data-delay="50" data-tooltip="Ver Perfil">
                                                <i class="fa fa-eye" style="color:grey"></i>
                                            </a>
                                        @else
                                            <a href="{{route('student.show', $admin->id)}}" class="btn-floating waves-circle white tooltiped profile" data-position="bottom" data-delay="50" data-tooltip="Ver Perfil">
                                                <i class="fa fa-eye" style="color:grey"></i>
                                            </a>
                                        @endif
                                    </li>

                                    <li data-id="{{$admin->id}}" style="display: inline-block; padding-left: 3px">
                                        <a href="{{route('destroy.user', $admin->id)}}" class="btn-floating waves-circle white tooltiped delete" data-position="bottom" data-delay="50" data-tooltip="Eliminar">
                                            <i class="fa fa-trash-o" style="color:red"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>

                    @endif
                @endforeach
            @endforeach

            </tbody>
        </table>
    </div>

    <div id="create">
        @include('dashboard.views.administrators.formCreate')
    </div>

    <div id="edit">
        @include('dashboard.views.administrators.formEdit')
    </div>

    <div id="asignDirector">
        @include('dashboard.views.administrators.groupsDirector')
    </div>

@endsection

@section('js')
    @include('dashboard.views.administrators.js')
@endsection