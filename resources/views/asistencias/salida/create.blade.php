<div class="modal fade in" id="modal-add-salida" tabindex="-1" role="dialog" 
aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-small ">
        <div class="modal-content">
            <form id="form-add-salida">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close-modal"><i class="material-icons">clear</i></button>
                <h4 class="modal-title text-success" id="title-add">REGISTRAR</h4>
            </div>
            <div class="modal-body text-center">
                <select name="empleado_salida" id="empleado_salida" class="selectpicker show-tick" data-live-search="true" data-style="select-with-transition" title="Seleccione" required>
                    @foreach($usuarios as $user)
                    <option value="{{$user->id}}">{{$user->nombre}} {{$user->apellido}}</option>
                    @endforeach
                </select>
                <span class="material-input" style="display:none" id="error_empleado_salida_1">Debe registrar su ingreso primero</span>
                <span class="material-input" style="display:none" id="error_empleado_salida_2">Puede registrar su salida</span>
                <span class="material-input" style="display:none" id="error_empleado_salida_3">Ya se ha registrado su salida</span>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-simple" data-dismiss="modal" id="close-modal">No<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 39.9531px; top: 10px; background-color: rgb(153, 153, 153); transform: scale(12.7949);"></div></div></button>
                <button type="submit" class="btn btn-success" id="add-salida">SÍ</button>
            </div>
            </form>
        </div>
    </div>
</div>