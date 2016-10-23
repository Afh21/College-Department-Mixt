<div id="modalEditGroup" class="modal">

    <style>
        .modal .modal-content{ padding: 0px !important; }
        .modal .modal-footer { padding: 0px; }
    </style>

    <div class="modal-content">

        <div class="row">
            <form class="col l11 push-l1" id="formEditGroup">
                <input type="hidden" id="tokenEditGroup" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="input-field col l6">
                        <i class="fa fa-angle-right prefix"></i>
                        <input id="updcode" type="text" class="validate" name="codegroup">
                        <label for="updcode">Codigo del Grupo </label>
                    </div>
                    <div class="input-field col l6">
                        <i class="fa fa-angle-right prefix"></i>
                        <input id="updname" type="text" class="validate" name="namegroup">
                        <label for="updname">Nombre del Grupo </label>
                    </div>

                    <div class="input-field col l6 center" id="jornada">
                        Jornada:
                        <a type="button" class="btn-float btn-floating white tooltiped updateJornade" data-delay="50" data-possiton="top" data-tooltip="Editar Jornada">
                            <i class="fa fa-lock" style="color:black"></i>
                        </a>
                        <a type="button" class="btn-float btn-floating white tooltiped updateJornadeAgain" data-delay="50" data-possiton="top" data-tooltip="Editar Jornada">
                            <i class="fa fa-unlock" style="color:black"></i>
                        </a>
                        <span class="chip" id="jorn"> </span>

                    </div>
                    <div class="input-field col l6" id="updJornade" style="display:none">
                        <select name="jornade" >
                            <option value="" disabled selected>Seleccione la Jornada</option>
                            <option value="AM" >Mañana</option>
                            <option value="PM"> Tarde </option>
                        </select>
                        <label>Jornada</label>
                    </div>

                    <div class="input-field col l6">
                        <i class="fa fa-angle-right prefix"></i>
                        <input id="name" type="text" class="validate" name="cantgroup" value="30">
                        <label for="name">Cantidad del Grupo </label>
                    </div>

                    <div class="col l12 center" id="math">
                        Materias:
                        <a type="button" class="btn-float btn-floating white tooltiped updateMathfromGroup" data-delay="50" data-possiton="top" data-tooltip="Editar Materias" >
                            <i class="fa fa-lock left" style="color: black"></i> </a>
                        <a type="button" class="btn-float btn-floating white tooltiped updateMathfromGroupAgain" data-delay="50" data-possiton="top" data-tooltip="Editar Materias" >
                            <i class="fa fa-unlock left" style="color: black"></i> </a>
                    </div>
                    <div class="input-field col l8 push-l2">
                        <div class="input-field col l12 mathsList" style="display: none">
                            <select multiple id="mathsGroups" name="maths[]"> </select>
                            <label>Por favor seleccione alguna materia</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="modal-footer" style="margin: 0px ">
        <div class="center">
            <ul style="list-style-type: none">
                <li style="display: inline-block" id="editGroup">
                    <button class="waves-effect waves-green white btn-floating center sendFormEditGroup">
                        <i class="fa fa-plus teal "></i>
                    </button>
                </li>
                <li style="display: inline-block; padding-left: 15px">
                    <button class=" modal-action modal-close waves-effect waves-green white btn-floating center">
                        <i class="fa fa-times deep-orange accent-3"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>