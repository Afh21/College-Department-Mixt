<div class="modal row" id="modalCreate">

    <div class="center" style="padding-top:20px">
        <h4> Creacion de Usuarios </h4>
    </div>

    <div class="modal-content modal-lg">

        <form method="POST" id="formCreate" class="col s12">
            <input type="hidden" name="_token" id="tokenC" value="{{csrf_token()}}">
            <div class="row">

                <div class="col l12 center">
                        <ul style="list-style-type:none" id="type">
                            <li style="display:inline">
                                <input name="group1" type="radio" id="test1" value="1" checked />
                                <label for="test1">Administrador</label>
                            </li>
                            <li style="display:inline">
                                <input name="group1" type="radio" id="test2" value="2" />
                                <label for="test2">Profesor</label>
                            </li>
                            <li style="display:inline">
                                <input name="group1" type="radio" id="test3" value="3" />
                                <label for="test3">Estudiante</label>
                            </li>
                        </ul>
                </div>

                <div class="col l6 push-l3 groups">
                    <select name="groups" id="groups">
                        <option value="" disabled selected> Seleccione un grupo</option>
                    </select>
                </div>

                <div class="col l12 groupsTeacher">
                    <div class="input-field col l6">
                        <select multiple name="groupsTeachersMultiple[]" id="groupsMultiple">
                            <option value="" disabled selected> Seleccione algun grupo</option>
                        </select>
                    </div>
                    <div class="input-field col l6">
                        <select multiple name="mathsTeacherMultiple[]" id="mathMultiple">
                            <option value="" disabled selected> Seleccione alguna materia</option>
                        </select>
                    </div>
                </div>


                <div class="col l12 s12">
                    <div class=" input-field col s6 l6">
                        <select id="user_type" name="user_type">
                            <option value="" selected>Escoga una opcion</option>
                            <option value="CC">Cedula de Ciudadania</option>
                            <option value="PS">Pasaporte</option>
                            <option value="RUT">Registro Unico Tributario</option>
                        </select>
                        <label for="user_type">Tipo de Identificacion </label>
                    </div>

                    <div class="input-field col s6 l6">
                        <i class="fa fa-lock prefix"></i>
                        <input id="cedula" type="text" class="validate" name="cc">
                        <label for="cedula">N° de Identificacion </label>
                    </div>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-right prefix"></i>
                    <input id="nombre" type="text" class="validate" name="nombre">
                    <label for="nombre">Nombres </label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-right prefix"></i>
                    <input id="apellidos" type="text" class="validate" name="apellidos">
                    <label for="apellidos">Apellidos </label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-double-right prefix"></i>
                    <input id="correo" type="email" class="validate" name="correo">
                    <label for="correo">Correo Electronico </label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-user-secret prefix"></i>
                    <input id="contraseña" type="password" class="validate" name="contraseña">
                    <label for="contraseña">Contraseña </label>
                </div>

                <div class="col s6 l6">
                    <div class="col l4">
                        <i class="fa fa-female fa-3x"></i> <i class="fa fa-male fa-3x"></i>
                    </div>
                    <div class="input-field col l8">
                        <select name="genero" id="genero">
                            <option value="" selected>Escoga una opcion</option>
                            <option value="F"><i class="fa fa-female left"></i>Mujer</option>
                            <option value="M"><i class="fa fa-male left"></i>Hombre</option>
                        </select>
                        <label for="genero">Genero </label>
                    </div>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-calendar-plus-o prefix"></i>
                    <input id="fecha_nac" type="text" class="validate" name="fecha_nac">
                    <label for="fecha_nac">Fecha de Nacimiento </label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-tags prefix"></i>
                    <input disabed id="edad" type="text" class="validate"  name="edad">
                    <label for="edad">Edad </label>
                </div>

                <div class="input-field col s6">
                    <input id="depto" type="text" class="validate" name="depto">
                    <label for="depto"> Departamento </label>
                </div>

                <div class="input-field col s6">
                    <input id="town" type="text" class="validate" name="town">
                    <label for="town"> Municipio </label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-user-secret prefix"></i>
                    <input id="direccion" type="text" class="validate" name="direccion">
                    <label for="direccion">Direccion </label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-phone prefix"></i>
                    <input id="telefono" type="text" class="validate" name="telefono">
                    <label for="telefono">Telefono </label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-heart prefix"></i>
                    <input id="rh" type="text" class="validate" name="rh">
                    <label for="rh">Tipo de Sangre (rh) </label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-institution prefix"></i>
                    <input id="profesion" type="text" class="validate" name="profesion">
                    <label for="profesion">Titulo Obtenido </label>
                </div>

        </form>
    </div>

    <div class="modal-footer center">
        <div class="center">
            <ul style="list-style-type: none; margin-bottom: 20px">
                <li style="display: inline">
                    <button class="waves-effect btn-floating crear tooltiped" data-position="bottom" data-delay="50" data-tooltip="Crear"> <i class="fa fa-plus"></i> </button>
                </li>
                <li style="display: inline; padding-left: 15px">
                    <button class="modal-action modal-close waves-effect btn-floating red tooltiped" data-position="bottom" data-delay="50" data-tooltip="Cancelar"> <i class="fa fa-times"></i> </button>
                </li>
            </ul>
        </div>
    </div>


</div>