@extends('dashboard.app')

@section('content')
    <div class="row">

        <table class="table-hovered">
            <thead>
            <tr>
                <td>Tipo</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>¿Director de Grupo?</td>
                <td>Grupos Asignados</td>
                <td>Materias Asignadas</td>
                <td></td>
            </tr>
            </thead>
            <tbody>

            @foreach($admin as $admin)
                @foreach($admin->roles as $role)
                    @if($role->slug == 'teacher')
                <tr data-id="{!! $admin->id !!}">
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
                        @if($admin->is('teacher'))
                            @if($admin->TeacherDirector()->count()  > 0 )
                                @foreach($admin->TeacherDirector as $group)
                                    <span class="chip green tooltipped" data-tooltip="Grupo asignado" data-delay="50" data-possition="buttom">{!! $group->group_name !!}</span>
                                    <a href="{!! route('UnassignGroup', $admin->id) !!}" class="btn-floating"><i class=" fa fa-refresh"></i></a>
                                @endforeach
                            @else
                                <span class="chip" style="color: black">Disponible</span>
                                <button class="btn-floating green tooltipped modal-trigger AsignGroupDirector" data-target="modalAsignGroup" data-tooltip="Asignar grupo" data-delay="50" data-possition="buttom"><i class="fa fa-plus"></i></button>
                            @endif
                        @elseif($admin->is('student'))
                            <span class="chip" style="color: black">{!! $admin->group->group_name !!}</span>
                        @endif
                    </td>


                    <td class="center">
                        @if($admin->is('teacher'))
                            @if($admin->TeacherGroups->count() > 0)
                                @foreach($admin->TeacherGroups as $groups)
                                    <span class="chip">{!! $groups->group_name !!}</span>
                                @endforeach
                            @endif
                        @endif
                    </td>
                    <td class="center">
                        @if($admin->is('teacher'))
                            @if($admin->TeacherMaths->count() > 0)
                                @foreach($admin->TeacherMaths as $math)
                                    <span class="chip">{!! $math->math_name !!}</span>
                                @endforeach
                            @else
                                "No hay materias asignadas"
                            @endif
                        @endif
                    </td>

                    <td>
                        <ul style="padding: 0px 3px">
                            <li data-id="{{$admin->id}}" style="display: inline-block; padding-left: 0px">
                                <button class="btn-floating waves-circle white tooltiped edit modal-trigger" data-target="modalEdit" data-id="{{$admin->id}}" data-position="bottom" data-delay="50" data-tooltip="Editar">
                                    <i class="fa fa-edit" style="color:black"></i>
                                </button>
                            </li>

                            <li data-id="{{$admin->id}}" style="display: inline-block; padding-left: 0px">
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

                            <li data-id="{{$admin->id}}" style="display: inline-block; padding-left: 0px">
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