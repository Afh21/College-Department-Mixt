<div id="modalAsignGroup" class="modal row">
    <div class="modal-content" style="margin: 3em 0px">
        <div class="col l6">
            <span style="font-size: 1.2em"> <b> Asignar grupo a: </b> </span> <span class="chip"> {!! $admin->name !!} </span>
            <br><br>
            <form id="FormGroupDirector" data-teacher="{!! $admin->id !!}">
                <input type="hidden" id="tokenGroupDirector" name="_token" value="{{csrf_token()}}">

                    <div class="input-field col l12">
                        <select name="AsignarGrupoDirector" id="AsignGroupDirectorAvailable"> </select>
                        <label for="AsignGroupDirectorAvailable">Asignar Grupo</label>
                    </div>

            </form>
        </div>

        <div class="col l4" style="margin: 3em 0px">
            <button class="btn-floating green tooltipped SendGroupToDirector" style="margin-top: 20px; margin-bottom: 3em" data-tooltip="Agregar grupo" data-possition="bottom" data-delay="50">
                <i class="fa fa-plus prefix"></i></button>
        </div>
    </div>

    <div class="modal-footer center col l2" style="mnargin: 3em 0px">
        <a href="" class=" modal-action modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
</div>