<div class="modal fade in" id="modal-delete" tabindex="-1" role="dialog" a
ria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-small">
        <div class="modal-content">
            <form id="form-delete" autocomplete="off">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="close-modal"><i class="material-icons">clear</i></button>
                <h4 class="modal-title text-danger" id="title-add">ELIMINAR</h4>
            </div>
            <div class="modal-body text-center">
                <h5>¿Desea eliminar al usuario: <br>
                    <b id="user_name"></b>?</h5>
                <input type="hidden" name="id" id="delete_user">
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-simple" data-dismiss="modal">No<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 39.9531px; top: 10px; background-color: rgb(153, 153, 153); transform: scale(12.7949);"></div></div></button>
                <button type="submit" class="btn btn-danger" id="user-add">
                    <i class="material-icons">delete</i>
                    SÍ
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
