<div id="modalCreatePeriod" class="modal">

    <style>
        .modal .modal-content{
            padding: 0px !important;
        }
        .modal .modal-footer {
            padding: 0px;
        }
    </style>

    <div class="modal-content">

        <div class="row">
            <form class="col l8 push-l2" id="formCreatePeriod">
                <input type="hidden" id="tokenCreatePeriod" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="input-field col l12">
                        <i class="fa fa-angle-right prefix"></i>
                        <input id="name" type="text" class="validate" name="create">
                        <label for="name">Nombre del Periodo</label>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <div class="modal-footer" style="margin: 0px ">
        <div class="center">
            <ul style="list-style-type: none">
                <li style="display: inline-block">
                    <button class="waves-effect waves-green white btn-floating center sendFormCreatePeriod">
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