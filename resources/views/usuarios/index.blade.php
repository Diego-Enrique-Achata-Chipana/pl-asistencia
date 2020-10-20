@extends('layouts.admin')
@section('titulo')
Empleados
@endsection
@section('contenido')
<div class="col-md-12">
    <div class="card" id="card-asistencia-entrada">
        <div class="card-header card-header-icon" data-background-color="green">
            <i class="material-icons">person</i>
        </div>
        <div class="card-content">
            <h4 class="card-title">Empleados
            <div class="pull-right">
                <button class="btn btn-success btn-round btn-fab btn-fab-mini pull-right" data-toggle="modal"
                data-target="modal-add" id="btn-add">
                    <i class="material-icons">add</i>
                </button>
                @include('usuarios.create')
            </div>
            </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <a class="btn btn-sm btn-danger btn-round" 
                        href="usuarios/pdf" target="_blank">
                            pdf
                        </a>
                        <a class="btn btn-sm btn-success btn-round"
                        href="usuarios/excel">
                            Excel
                        </a>
                    </div>
                    <div class="col-md-3 col-md-offset-6">
                        <form class="navbar-form navbar-right" role="search" autocomplete="off"
                            id="form-search-ingreso">
                            <div class="form-group form-search is-empty has-success">
                                <input type="text" class="form-control" placeholder="Buscar por nombre" 
                                id="search-usuario" name="search_user">
                                <span class="material-input"></span>
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-just-icon btn-round btn-success">
                                <i class="material-icons" id="icon_search">search</i>
                                <!-- <i class="fa fa-spinner fa-pulse fa-lg" id="icon_load" style="display:none"></i> -->
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-user">
                <div class="text-center" style="margin-top: 100px; margin-bottom: 100px;">
                    <span id="cargando">
                        <i class="fa fa-spinner fa-pulse fa-5x"></i>
                    </span>
                </div>
            </div>
            <div class="table-user-ajax">
                <div class="text-center" style="margin-top: 100px; margin-bottom: 100px; display:none;">
                    <span id="cargando-ajax">
                        <i class="fa fa-spinner fa-pulse fa-5x"></i>
                    </span>
                </div>
            </div>
            @include('usuarios.show')
            @include('usuarios.edit')
            @include('usuarios.delete')
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})

function readUser(){
    let url = 'usuarios/read';
    $.ajax({
        url: url,
        method: 'get',
        datatype: 'html',
        success: function(data){
            $('.table-user').html(data)
            $('#table-user-ajax').hide()
            $('#search-usuario').val('')
        }
    })
}

readUser()

function searchUsuario(){
    $(document).on('keyup', '#search-usuario', function(){
        let usuario = $(this).val();
        let url = 'usuarios/searchUser';
        if(usuario == ''){
            readUser()
        }else{
            $.ajax({
                url: url,
                data: {
                    search_user: usuario
                },
                method: 'get',
                datatype: 'html',
                beforeSend: function(){
                //    $('#icon_search').hide()
                //    $('#icon_load').show()
                    //   $('#cargando-ajax').show()
                },
                success: function(data){
                   $('.table-user-ajax').html(data)
                   $('#table-user').hide()
                },
                complete: function(){
                //    $('#icon_search').show()
                //    $('#icon_load').hide()
                    //   $('#cargando-ajax').show()
                }
            })
        }
    })
}

searchUsuario()

function validateFormCreateUser(){
    $('#nombre').on('keyup', function(){
        let nombre = $(this).val();
        if(nombre == ""){
            $('.h-nombre').removeClass('has-success')
            $('.h-nombre').addClass('has-danger')
            $('#l-nombre').css('color','red');
            $('#nombre').css({'color':'red','border-color':'red'})
            $('#error_nombre_1').show()
            $('#error_nombre_1').css('color','red')
            $('#error_nombre_2').hide()
            $('#nombre_error').show()
            $('#nombre_check').hide()
        }else if(nombre.length < 10){
            $('.h-nombre').removeClass('has-success')
            $('.h-nombre').addClass('has-danger')
            $('#l-nombre').css('color','red')
            $('#nombre').css('color','red')
            $('#error_nombre_2').show()
            $('#error_nombre_2').css('color','red')
            $('#error_nombre_1').hide()
            $('#nombre_error').show()
            $('#nombre_check').hide()
        }else{
            $('.h-nombre').addClass('has-success')
            $('#l-nombre').css('color','')
            $('#nombre').css({'color':'','border-color':''})
            $('#error_nombre_1').hide()
            $('#error_nombre_2').hide()
            $('#nombre_error').hide()
            $('#nombre_check').show()
        }
    })

    $('#apellido').on('keyup', function(){
        let apellido = $(this).val();
        if(apellido == ""){
            $('.h-apellido').removeClass('has-success')
            $('.h-apellido').addClass('has-danger')
            $('#l-apellido').css('color','red')
            $('#apellido').css({'color':'red','border-color':'red'})
            $('#error_apellido_1').show()
            $('#error_apellido_1').css('color','red')
            $('#error_apellido_2').hide()
            $('#apellido_error').show()
            $('#apellido_check').hide()
        }else if(apellido.length < 10){
            $('.h-apellido').removeClass('has-success')
            $('.h-apellido').addClass('has-danger')
            $('#l-apellido').css('color','red')
            $('#apellido').css('color','red')
            $('#error_apellido_2').show()
            $('#error_apellido_2').css('color','red')
            $('#error_apellido_1').hide()
            $('#apellido_error').show()
            $('#apellido_check').hide()
        }else{
            $('.h-apellido').addClass('has-success')
            $('#l-apellido').css('color','')
            $('#apellido').css({'color':'','border-color':''})
            $('#error_apellido_1').hide()
            $('#error_apellido_2').hide()
            $('#apellido_error').hide()
            $('#apellido_check').show()
        }
    })

    $('#email').on('keyup', function(){
        let email = $(this).val();
        let validate_email = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{3,4}/;
        let url = 'usuarios/validateEmail';
        if(email == ""){
            $('.h-email').removeClass('has-success')
            $('.h-email').addClass('has-danger')
            $('#l-email').css('color','red')
            $('#email').css({'color':'red','border-color':'red'})
            $('#error_email_1').show()
            $('#error_email_1').css('color','red')
            $('#error_email_2').hide()
            $('#error_email_3').hide()
            $('#error_email_4').hide()
            $('#email_error').show()
            $('#email_check').hide()
        }else if(!validate_email.test(email)){
            $('.h-email').removeClass('has-success')
            $('.h-email').addClass('has-danger')
            $('#l-email').css('color','red')
            $('#email').css('color','red')
            $('#error_email_2').show()
            $('#error_email_2').css('color','red')
            $('#error_email_1').hide()
            $('#error_email_3').hide()
            $('#error_email_4').hide()
            $('#email_error').show()
            $('#email_check').hide()
        }else{
            $.ajax({
            url: url,
            data: {
                email: email
            },
            method: 'get',
            datatype: 'json',
            success: function(response){
                if(response == 'registrado'){
                    $('.h-email').removeClass('has-success')
                    $('.h-email').addClass('has-danger')
                    $('#l-email').css('color','red')
                    $('#email').css({'color':'red','border-color':'red'})
                    $('#error_email_1').hide()
                    $('#error_email_2').hide()
                    $('#error_email_3').show()
                    $('#error_email_3').css('color','red')
                    $('#error_email_4').hide()
                    $('#email_error').show()
                    $('#email_error').show()
                    $('#email_check').hide()
                    $('#user-add').prop('disabled',true)
                }else{
                    $('.h-email').addClass('has-success')
                    $('#l-email').css('color','');
                    $('#email').css({'color':'','border-color':''})
                    $('#error_email_1').hide()
                    $('#error_email_2').hide()
                    $('#error_email_3').hide()
                    $('#error_email_4').show()
                    $('#error_email_4').css('color','green')                    
                    $('#email_error').hide()
                    $('#email_check').show()
                    $('#user-add').prop('disabled',false);
                }
            }
            })
        }
    })

    $('#password').on('keyup', function(){
        let password = $(this).val();
        if(password == ""){
            $('.h-password').removeClass('has-success')
            $('.h-password').addClass('has-danger')
            $('#l-password').css('color','red')
            $('#password').css({'color':'red','border-color':'red'})
            $('#error_password_1').show()
            $('#error_password_1').css('color','red')
            $('#error_password_2').hide()
            $('#error_email_4').hide()
            $('#password_error').show()
            $('#password_check').hide()
        }else if(password.length < 8){
            $('.h-password').removeClass('has-success')
            $('.h-password').addClass('has-danger')
            $('#l-password').css('color','red')
            $('#password').css('color','red')
            $('#error_password_2').show()
            $('#error_password_2').css('color','red')
            $('#error_password_1').hide()
            $('#password_error').show()
            $('#password_check').hide()
        }else{
            $('.h-password').addClass('has-success')
            $('#l-password').css('color','')
            $('#password').css({'color':'','border-color':''})
            $('#error_password_1').hide()
            $('#error_password_2').hide()
            $('#password_error').hide()
            $('#password_check').show()
        }
    })
}

validateFormCreateUser()

function validateEmail(){
    $('#email').on('keyup', function(){
        let email = $(this).val();
        let url = 'usuarios/validateEmail';
        $.ajax({
            url: url,
            data: {
                email: email
            },
            method: 'get',
            datatype: 'json',
            success: function(response){
                if(response == 'registrado'){
                    $('#user-add').prop('disabled',true)
                }else{
                    $('#user-add').prop('disabled',false)
                }
            }
        })
    })
}

validateEmail()

function createUser(){
    $(document).on('click', '#btn-add', function(){
        $('.h-nombre').addClass('has-success') 
        $('#l-nombre').css('color','');
        $('#nombre').val('')
        $('#nombre').css({'color':'','border-color':''})
        $('#error_nombre_1').hide()
        $('#error_nombre_2').hide()
        $('#nombre_error').hide()
        $('#nombre_check').hide()
        $('.h-apellido').addClass('has-success')
        $('#l-apellido').css('color','');
        $('#apellido').val('')
        $('#apellido').css({'color':'','border-color':''})
        $('#error_apellido_1').hide()
        $('#error_apellido_2').hide()
        $('#apellido_error').hide()
        $('#apellido_check').hide()
        $('.h-email').addClass('has-success')
        $('#l-email').css('color','');
        $('#email').val('')
        $('#email').css({'color':'','border-color':''})
        $('#error_email_1').hide()
        $('#error_email_2').hide()
        $('#error_email_3').hide()
        $('#error_email_4').hide()
        $('#email_error').hide()
        $('#email_check').hide()
        $('.h-password').addClass('has-success')
        $('#l-password').css('color','');
        $('#password').val('')
        $('#password').css({'color':'','border-color':''})
        $('#error_password_1').hide()
        $('#error_password_2').hide()
        $('#password_error').hide()
        $('#password_check').hide()
        $('#nombre_check').hide()
        $('#apellido_check').hide()
        $('#email_check').hide()
        $('#error_email_4').hide()
        $('#password_check').hide()
        $('#modal-add').modal('show');
    })

    $('#form-add').submit(function(e){
        e.preventDefault();
        let nombre = $('#nombre').val();
        let apellido = $('#apellido').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let url = 'usuarios/create';
        $.ajax({
            url: url,
            data: {
                nombre: nombre,
                apellido: apellido,
                email: email,
                password: password
            },
            method: 'post',
            datatype: 'json',
            beforesend: function(){
                // validateFormCreateUser();
                $('#user-add').prop('disabled',true)
                $('#user-add').html('<i class="material-icons">autorenew</i>')
            },
            success: function(data){
                $('#modal-add').modal('hide')
                toastr.success('Registrado exitosamente','Usuario : '+nombre)
                $('#form-add').trigger('reset')
                $('#search-usuario').val('')
                readUser()
            },
            complete: function(){
                
            }
        })
    })
}

createUser();

function showUser(){
    $(document).on('click','#btn-show',function(){
        let id = $(this).attr('id-user');
        let url = 'usuarios/show/'+id;
        $.ajax({
            url: url,
            data: {
                id: id
            },
            method: 'get',
            datatype: 'json',
            beforeSend: function(){

            },
            success: function(usuario){
                $('#nombre_show').text(usuario['nombre'])
                $('#apellido_show').text(usuario['apellido'])
                $('#email_show').text(usuario['email'])
                $('#modal-show').modal('show')
            }
        })
    })
}

showUser()

function editUser(){
    $(document).on('click','#btn-edit',function(){
        let id = $(this).attr('id-user');
        let url = 'usuarios/edit/'+id;
        $.ajax({
            url: url,
            data: {
                id: id
            },
            method: 'get',
            datatype: 'json',
            beforeSend: function(){

            },
            success: function(usuario){
                $('#id_edit').val(usuario['id'])
                $('#nombre_edit').val(usuario['nombre'])
                $('#apellido_edit').val(usuario['apellido'])
                $('#email_edit').val(usuario['email'])
                $('#modal-edit').modal('show')
            }
        })
    })

    $('#form-edit').on('submit', function(e){
        e.preventDefault();
        let nombre = $('#nombre_edit').val();
        let apellido = $('#apellido_edit').val();
        let id = $('#id_edit').val();
        let url = 'usuarios/update/'+id;
        $.ajax({
            url: url,
            data: {
                nombre: nombre,
                apellido: apellido
            },
            method: 'post',
            datatype: 'json',
            beforeSend: function(){

            },
            success: function(data){
                $('#modal-edit').modal('hide');
                toastr.success('Actualizado exitosamente','Usuario: '+nombre)
                readUser()
            }
        })
    })
}

editUser()

function deleteUser(){
    $(document).on('click','#btn-delete', function(){
        $('#user_name').text($(this).attr('name-user'))
        $('#delete_user').val($(this).attr('id-user'))
        $('#modal-delete').modal('show')
    })

    $('#form-delete').on('submit', function(e){
        e.preventDefault();
        let id = $('#delete_user').val();
        let nombre = $('#user_name').text();
        let url = 'usuarios/'+id;
        $.ajax({
            url: url,
            data: {
                id: id
            },
            method: 'post',
            datatype: 'json',
            success: function(data){
                $('#modal-delete').modal('hide')
                toastr.success('Eliminado exitosamente','Usuario: '+nombre)
                readUser()
            },
            error: function(){
                $('#modal-delete').modal('hide')
                toastr.error('No se puede eliminar','Usuario: '+nombre)
            }
        })
    })
}

deleteUser()
</script>
@endsection