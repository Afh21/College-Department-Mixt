<div class="modal row" id="modalEdit">

    <div class="center" style="padding-top:20px">
        <h3> Actualizacion de Datos </h3>
    </div>

    <div class="modal-content modal-lg">
        <form method="PUT" id="formEdit" class="col s12">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
            <div class="row">

                <div class="input-field col l12 s12">
                    <div class="col s6 l6">
                        <select id="type" name="type">
                            <option value="" selected>Escoga una opcion</option>
                            <option value="CC">Cedula de Ciudadania</option>
                            <option value="PS">Pasaporte</option>
                            <option value="RUT">Registro Unico Tributario</option>
                        </select>
                    </div>
                    <div class="col l6">
                        <i class="fa fa-lock prefix"></i>
                        <input id="identity" type="text" class="validate" name="identity">
                    </div>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-right prefix"></i>
                    <input id="name" type="text" class="validate" name="name">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-right prefix"></i>
                    <input id="lastname" type="text" class="validate" name="lastname">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-angle-double-right prefix"></i>
                    <input id="email" type="email" class="validate" name="email">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-user-secret prefix"></i>
                    <input id="password" type="password" class="validate" name="password">
                </div>

                <div class="col s6 l6">
                    <div class="col l4">
                        <i class="fa fa-female fa-3x"></i> <i class="fa fa-male fa-3x"></i>
                    </div>
                    <div class="col l8">
                        <select name="genre" id="genre">
                            <option value="" selected>Escoga una opcion</option>
                            <option value="F"><i class="fa fa-female left"></i>Mujer</option>
                            <option value="M"><i class="fa fa-male left"></i>Hombre</option>
                        </select>
                    </div>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-calendar-plus-o prefix"></i>
                    <input id="birthday" type="text" class="validate" name="birthday">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-tags prefix"></i>
                    <input id="age" type="text" class="validate" name="age">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-user-secret prefix"></i>
                    <input id="address" type="text" class="validate" name="address">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-phone prefix"></i>
                    <input id="phone" type="text" class="validate" name="phone">
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-heart prefix"></i>
                    <input id="blood" type="text" class="validate" name="blood">
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
                </div>

                {{--<div class="input-field col s6 select-city">
                    <i class="fa fa-map-marker prefix"></i>
                    <select name="dept" id="dept"></select>
                </div>

                <div class="input-field col s6">
                    <i class="fa fa-map-signs prefix"></i>
                    <select name="city" id="city"></select>
                </div> --}}

            </div>
        </form>
    </div>

    <div class="modal-footer center">
        <div class="center">
            <ul style="list-style-type: none; margin-bottom: 20px">
                <li style="display: inline">
                    <button class="waves-effect btn-floating update"> <i class="fa fa-send"></i> </button>
                </li>
                <li style="display: inline; padding-left: 15px">
                    <button class="modal-action modal-close waves-effect btn-floating red"> <i class="fa fa-times-circle"></i> </button>
                </li>
            </ul>
        </div>
    </div>
</div>