<div class="modal fade in" id="modal-edit" tabindex="-1" role="dialog" a
ria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-small ">
        <div class="modal-content">
            <form id="form-edit" autocomplete="off">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close-modal"><i class="material-icons">clear</i></button>
                <h4 class="modal-title text-success" id="title-add">EDITAR</h4>
            </div>
            <div class="modal-body text-center">
                <input type="hidden" name="id" id="id_edit">
                <div class="form-group label-floating is-empty has-success is-focused h-nombre">
                    <div class="pull-left">
                        <label for="nombre" class="control-label" id="l-nombre">Nombre:</label>
                    </div>
                    <input type="text" class="form-control" id="nombre_edit" name="nombre_edit" required>
                    <span class="help-block pull-left" id="error_nombre_1" style="display:none">Ingrese su nombre</span>
                    <span class="help-block pull-left" id="error_nombre_2" style="display:none">Ingrese al menos 10 caracteres</span>
                    <span class="material-icons form-control-feedback" style="display:none" id="nombre_check">done</span>
                    <span class="material-icons form-control-feedback" style="display:none" id="nombre_error">clear</span>
                </div>
                <div class="form-group label-floating is-empty has-success  is-focused h-apellido">
                    <div class="pull-left">
                        <label for="apellido" class="control-label" id="l-apellido">Apellido:</label>
                    </div>
                    <input type="text" class="form-control" id="apellido_edit" name="apellido_edit" required>
                    <span class="help-block pull-left" id="error_apellido_1" style="display:none">Ingrese su apellido</span>
                    <span class="help-block pull-left" id="error_apellido_2" style="display:none">Ingrese al menos 10 caracteres</span>
                    <span class="material-icons form-control-feedback" style="display:none" id="apellido_check">done</span>
                    <span class="material-icons form-control-feedback" style="display:none" id="apellido_error">clear</span>
                </div>
                <div class="form-group label-floating is-empty has-success is-focused h-email">
                    <div class="pull-left">
                        <label for="email" class="control-label" id="l-email">Email:</label>
                    </div>
                    <input type="email" class="form-control" id="email_edit" name="email_edit" disabled >
                    <span class="help-block pull-left" id="error_email_1" style="display:none">Ingrese su email</span>
                    <span class="help-block pull-left" id="error_email_2" style="display:none">Ingrese un email valido</span>
                    <span class="help-block pull-left" id="error_email_3" style="display:none">El email no esta disponible</span>
                    <span class="help-block pull-left" id="error_email_4" style="display:none">El email esta disponible</span>
                    <span class="material-icons form-control-feedback" style="display:none" id="email_check">done</span>
                    <span class="material-icons form-control-feedback" style="display:none" id="email_error">clear</span>
                </div>
                <!-- <div class="form-group label-floating is-empty has-success h-password">
                    <div class="pull-left">
                        <label for="password" class="control-label" id="l-password">Contraseña:</label>
                    </div>
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="help-block pull-left" id="error_password_1" style="display:none">Ingrese su contraseña</span>
                    <span class="help-block pull-left" id="error_password_2" style="display:none">Ingrese al menos 8 caracteres</span>
                    <span class="help-block pull-left" id="error_password_3" style="display:none">---</span>
                    <span class="material-icons form-control-feedback" style="display:none" id="password_check">done</span>
                    <span class="material-icons form-control-feedback" style="display:none" id="password_error">clear</span>
                </div> -->
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-simple" data-dismiss="modal" id="close-modal">No<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 39.9531px; top: 10px; background-color: rgb(153, 153, 153); transform: scale(12.7949);"></div></div></button>
                <button type="submit" class="btn btn-success" id="user-edit">SÍ</button>
            </div>
            </form>
        </div>
    </div>
</div>
