<div class="modal row" id="modalCreate">

    <div class="center" style="padding-top:20px">
        <h3> Crear Administrador </h3>
    </div>

    <div class="modal-content modal-lg">

        <form method="POST" id="formCreate" class="col s12">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <div class="row">

                <div class="input-field col l12 s12">
                    <div class="col s6 l6">
                        <select id="user_type" name="user_type">
                            <option value="" selected>Escoga una opcion</option>
                            <option value="CC">Cedula de Ciudadania</option>
                            <option value="PS">Pasaporte</option>
                            <option value="RUT">Registro Unico Tributario</option>
                        </select>
                    </div>
                    <div class="col l6">
                        <i class="fa fa-lock prefix"></i>
                        <input id="cedula" type="text" class="validate" name="cc">
                    </div>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-right prefix"></i>
                    <input id="nombre" type="text" class="validate" name="nombre">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-right prefix"></i>
                    <input id="apellidos" type="text" class="validate" name="apellidos">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-double-right prefix"></i>
                    <input id="correo" type="email" class="validate" name="correo">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-user-secret prefix"></i>
                    <input id="contraseña" type="password" class="validate" name="contraseña">
                </div>

                <div class="col s6 l6">
                    <div class="col l4">
                        <i class="fa fa-female fa-3x"></i> <i class="fa fa-male fa-3x"></i>
                    </div>
                    <div class="col l8">
                        <select name="genero" id="genero">
                            <option value="" selected>Escoga una opcion</option>
                            <option value="F"><i class="fa fa-female left"></i>Mujer</option>
                            <option value="M"><i class="fa fa-male left"></i>Hombre</option>
                        </select>
                    </div>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-calendar-plus-o prefix"></i>
                    <input id="fecha_nac" type="text" class="validate" name="fecha_nac">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-tags prefix"></i>
                    <input id="edad" type="text" class="validate" name="edad">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-user-secret prefix"></i>
                    <input id="direccion" type="text" class="validate" name="direccion">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-phone prefix"></i>
                    <input id="telefono" type="text" class="validate" name="telefono">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-heart prefix"></i>
                    <input id="rh" type="text" class="validate" name="rh">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-hand-o-right prefix"></i>
                    <input type="checkbox" class="filled-in" id="activo" name="activo"/>
                    <label for="activo">Activo</label>

                    <input type="checkbox" class="filled-in" id="inactivo" name="inactivo"/>
                    <label for="inactivo">Inactivo</label>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-institution prefix"></i>
                    <input id="profesion" type="text" class="validate" name="profesion">
                </div>

                <div class="input-field col s6">
                    <div id="d">
                        <select name="" id="d"></select>
                    </div>
                </div>

                <div class="input-field col s6">
                    <div id="m">
                        <select name="" id="m"></select>
                    </div>
                </div>

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