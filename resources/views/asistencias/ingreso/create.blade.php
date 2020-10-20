<div class="modal fade in" id="modal-add-ingreso" tabindex="-1" role="dialog" a
ria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-small ">
        <div class="modal-content">
            <form id="form-add-ingreso">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close-modal"><i class="material-icons">clear</i></button>
                <h4 class="modal-title text-success" id="title-add">REGISTRAR</h4>
            </div>
            <div class="modal-body text-center">
                <select name="empleado" id="empleado" class="selectpicker show-tick" data-live-search="true" data-style="select-with-transition" title="Seleccione" required>
                    @foreach($usuarios as $user)
                    <option value="{{$user->id}}">{{$user->nombre}} {{$user->apellido}}</option>
                    @endforeach
                </select>
                <span class="material-input" style="display:none" id="error_empleado">Ya se ha registrado su ingreso</span>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-simple" data-dismiss="modal" id="close-modal">No<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 39.9531px; top: 10px; background-color: rgb(153, 153, 153); transform: scale(12.7949);"></div></div></button>
                <button type="submit" class="btn btn-success" id="add-ingreso">SÍ</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- <div class="col-md-4 col-md-offset-4" id="card-create-asistencia-ingreso" style="display:none">
<div class="card">
    <form id="form-add" action="#" method="" novalidate="novalidate">
        <div class="card-header card-header-icon" data-background-color="green">
            <i class="material-icons">chrome_reader_mode</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Ingreso</h4>
            <div class="form-group label-floating">
                <select name="user_id" id="empleado" class="selectpicker show-tick" data-live-search="true" data-style="select-with-transition" title="Seleccione" required>
                    @foreach($usuarios as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <span class="material-input"></span>
            </div>
            <div class="form-footer text-right">
                <button type="submit" class="btn btn-success btn-fill" id="submit-add">Registrar</button>
            </div>
        </div>
    </form>
</div>
</div> -->