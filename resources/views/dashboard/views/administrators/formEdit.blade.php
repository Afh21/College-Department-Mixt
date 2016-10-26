<div class="modal row" id="modalEdit">

    <div class="center changeUser" style="padding-top:20px">
        <h3 id="title">  <span id="username"> <h5></h5> </span>  </h3>
    </div>

    <div class="modal-content modal-lg">
        <form method="PUT" id="formEdit" class="col s12">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <div class="row">

                <div class="col l12 center" id="GroupStudentRelation">
                    Grupo: <a type="button" class="btn-floating red waves-effect waves-circle tooltiped" style="margin-right: 10px; margin-left: 10px" id="UpdateGroupStudent" data-tooltip="Editar Grupo" data-possition="buttom" data-delay="50">
                        <i class="fa fa-refresh"></i> </a> <span class="chip" id="grupoEstudiante"></span>
                </div>
                <div class="input-field col l12 groupsChange center" style="display: none">
                    <ul style="list-style-type:none" id="typeUser">
                    </ul>
                </div>

                <div class="col l7 push-l3 groupsTeacherClick">
                    <select name="groupsTeachersMultipleStudent" id="groupsMultiple">
                        <option value="" disabled selected> Seleccione algun grupo</option>
                    </select>
                </div>

                <div class="col l12 GroupMathEdit">
                    <div class="input-field col l6 center">
                        <div id="groupsRelation">Grupos:
                            <a type="button" class="btn-floating red tooltiped waves-effect waves-circle groupClick" data-tooltip="Editar Grupos" data-possition="buttom" data-delay="50" style='margin-left:10px; margin-right: 15px; color: white'> <i class="fa fa-refresh"></i> &nbsp; </a>
                        </div>
                    </div>

                    <div class="input-field col l6 center">
                        <div id="mathsRelation">Materias:
                            <a type="button" class="btn-floating red waves-effect waves-circle tooltiped mathClick" data-tooltip="Editar Materias" data-possition="buttom" data-delay="50" style='margin-left:10px; margin-right: 15px; color: white'> <i class="fa fa-refresh"></i> &nbsp; </a> &nbsp;
                        </div>
                    </div>
                </div>

                <div class="input-field col l12 groupsTeacher">
                    <div class="input-field col l6">
                        <select multiple name="groupsTeachersMultipleProfe[]" id="groupsMultiple">
                            <option value="0" disabled selected> Seleccione algun grupo</option>
                        </select>
                    </div>
                    <div class="input-field col l6">
                        <select multiple name="mathsTeacherMultipleProfe[]" id="mathMultiple">
                            <option value="" disabled selected> Seleccione alguna materia</option>
                        </select>
                    </div>
                </div>


                <div class="input-field col l12 s12">
                    <div class="input-field col s6 l6" id="typeI">
                        <i class="fa fa-low-vision prefix"></i>
                        <input id="typeId" type="text" class="validate" disabled name="identity">
                    </div>
                    <div class="input-field col s6 l6" id="tipodeidentidad">
                        <select id="type" name="type">
                            <option value="" selected>Escoga una opcion</option>
                            <option value="CC">Cedula de Ciudadania</option>
                            <option value="PS">Pasaporte</option>
                            <option value="RUT">Registro Unico Tributario</option>
                        </select>
                        <label for="type"> Tipo de Identificacion </label>
                    </div>
                    <div class="input-field col l6">
                        <i class="fa fa-lock prefix"></i>
                        <input id="identity" type="text" class="validate" name="identity">
                        <label for="identity"> Numero de Identificacion </label>
                    </div>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-right prefix"></i>
                    <input id="name" type="text" class="validate" name="name">
                    <label for="name">Nombres Completos </label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-right prefix"></i>
                    <input id="lastname" type="text" class="validate" name="lastname">
                    <label for="lastname">Apellidos Completos</label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-double-right prefix"></i>
                    <input id="email" type="email" class="validate" name="email">
                    <label for="email">Correo Electronico</label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-user-secret prefix"></i>
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">Contraseña</label>
                </div>

                <div class="col s6 l6">

                    <div class="input-field col l8" id="GeneroHover">
                        <i id="genreId" class="prefix"></i>
                        <input type="text" id="genreId" disabled class="validate">
                        <label for="genreId"></label>
                    </div>

                    <div class="col l12" id="genre">
                        <div class="col l4">
                            <i class="fa fa-female fa-3x"></i> <i class="fa fa-male fa-3x"></i>
                        </div>
                        <div class="col l8" >
                            <select name="genre" id="genre">
                                <option value="" selected>Escoga una opcion</option>
                                <option value="F"><i class="fa fa-female left"></i>Mujer</option>
                                <option value="M"><i class="fa fa-male left"></i>Hombre</option>
                            </select>
                            <label for="genre">Genero</label>
                        </div>
                    </div>

                </div>

                <div class="input-field col s6">
                    <i class="fa fa-calendar-plus-o prefix"></i>
                    <input id="birthday" type="text" class="validate" name="birthday">
                    <label for="text">Fecha de Nacimiento</label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-tags prefix"></i>
                    <input id="age" type="text" class="validate" name="age">
                    <label for="age"> Edad</label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-user-secret prefix"></i>
                    <input id="address" type="text" class="validate" name="address">
                    <label for="address">Domicilio</label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-phone prefix"></i>
                    <input id="phone" type="text" class="validate" name="phone">
                    <label for="phone">Telefono de Contacto</label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-heart prefix"></i>
                    <input id="blood" type="text" class="validate" name="blood">
                    <label for="blood">Tipo de Sangre</label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-hand-o-right prefix"></i>
                    <input type="checkbox" class="filled-in" id="active" name="active"/>
                    <label for="active">Activo</label>

                    <input type="checkbox" class="filled-in" id="disabled" name="disabled"/>
                    <label for="disabled">Inactivo</label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-institution prefix"></i>
                    <input id="profession" type="text" class="validate" name="profession">
                    <label for="profession">Titulo Obtenido </label>
                </div>

            </div>
        </form>
    </div>

    <div class="modal-footer">
        <div class="center">
            <ul style="list-style-type: none; margin-bottom: 20px">
                <li style="display: inline">
                    <button class="waves-effect btn-floating btn-large update teal darken-1"> <i class="fa fa-send-o"></i> </button>
                </li>
                <li style="display: inline; padding-left: 15px">
                    <style>
                        .modal .modal-footer .btn, .modal .modal-footer .btn-large, .modal .modal-footer .btn-flat {float: none}
                    </style>
                    <button class="modal-action modal-close waves-effect btn-floating btn-large red" > <i class="fa fa-times"></i> </button>
                </li>
            </ul>
        </div>
    </div>
</div>