@extends('layouts.admin')
@section('titulo')
Asistencia
@endsection
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <!-- <h3 class="title text-center">Page Subcategories</h3>
        <br> -->
        <div class="nav-center">
            <ul class="nav nav-pills nav-pills-success nav-pills-icons" role="tablist">
                <li class="active">
                    <a href="#ingreso" role="tab" data-toggle="tab" aria-expanded="false">
                        <i class="material-icons">assignment</i> Ingreso
                    </a>
                </li>
                <li class="">
                    <a href="#salida" role="tab" data-toggle="tab" aria-expanded="false">
                        <i class="material-icons">assignment</i> Salida
                    </a>
                </li>
                <li class="">
                    <a href="#ingreso-salida" role="tab" data-toggle="tab" aria-expanded="false">
                        <i class="material-icons">chrome_reader_mode</i> Ingreso - Salida
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <!-- INGRESO -->
            <div class="tab-pane active" id="ingreso">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">LISTA DE INGRESO
                            <div class="pull-right">
                                <button class="btn btn-success btn-round btn-fab btn-fab-mini pull-right" data-toggle="modal"
                                data-target="modal-add" id="btn-add-ingreso">
                                    <i class="material-icons">add</i>
                                </button>
                                @include('asistencias.ingreso.create')
                                <button class="btn btn-success btn-round btn-fab btn-fab-mini pull-right" id="btn-load-ingreso"
                                style="display:none">
                                        <i class="material-icons">cached</i>
                                        <div class="ripple-container"></div>
                                </button>
                            </div>
                        </h4>
                        <div class="row">
                            <div class="col-md-8">
                            <form class="navbar-form navbar-right" role="search" autocomplete="off"
                            id="form-search-ingreso">
                                <div class="form-group form-search is-empty has-success">
                                    <input type="date" class="form-control" id="fecha_ingreso">
                                    <!-- <div class="bootstrap-datetimepicker-widget dropdown-menu usetwentyfour bottom open">
                                    </div> -->
                                    <span class="material-input"></span>
                                </div>
                                <div class="form-group form-search label-floating is-empty has-success h-ingreso-nombre">
                                    <label class="control-label">Nombre</label>

                                    <input type="text" class="form-control" id="search_ingreso">
                                    <span class="material-input"></span>
                                </div>
                                <button type="submit" class="btn btn-just-icon btn-round btn-success">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </form>
                            </div>
                        </div>
                        <div class="table-ingreso">
                            <div class="text-center" style="margin-top: 100px; margin-bottom: 100px;">
                                <span id="cargando">
                                <i class="fa fa-spinner fa-pulse fa-5x"></i>
                                </span>
                            </div>
                        </div>
                        <div class="table-ingreso-ajax">
                                <h1 style="display:none" id="load">Cargando...</h1>
                        </div>
                     </div>   
                </div>
            </div>
            <!-- SALIDA -->
            <div class="tab-pane" id="salida">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">LISTA DE SALIDA
                            <div class="pull-right">
                                <button class="btn btn-success btn-round btn-fab btn-fab-mini pull-right" 
                                data-toggle="modal" data-target="modal-add" id="btn-add-salida">
                                    <i class="material-icons">add</i>
                                </button>
                                @include('asistencias.salida.create')
                                <button class="btn btn-success btn-round btn-fab btn-fab-mini pull-right" id="btn-load-salida"
                                style="display:none">
                                        <i class="material-icons">cached</i>
                                        <div class="ripple-container"></div>
                                </button>
                            </div>
                        </h4>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <form class="navbar-form navbar-right" role="search" autocomplete="off"
                                id="form-search-salida">
                                    <div class="form-group form-search label-floating is-empty has-success h-salida-nombre">
                                        <label class="control-label">Nombre</label>
                                        <input type="search" class="form-control" name="search_salida_nombre" id="search_salida_nombre">
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="form-group form-search label-floating is-empty has-success h-salida-apellido" style="display:none" id="s_s_a">
                                        <label class="control-label">Apellido</label>
                                        <input type="search" class="form-control" name="search_salida_apellido" id="search_salida_apellido">
                                        <span class="material-input"></span>
                                    </div>
                                    <button type="submit" class="btn btn-just-icon btn-round btn-success">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="table-salida">
                                <h1 style="display:none" id="load">Cargando...</h1>
                        </div>
                        <div class="table-salida-ajax">
                                <h1 style="display:none" id="load">Cargando...</h1>
                        </div>
                     </div>   
                </div>
            </div>
            <!-- INGRESO - SALIDA -->
            <div class="tab-pane" id="ingreso-salida">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="green">
                        <i class="material-icons">assignment</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">LISTA DE INGRESO - SALIDA
                            <div class="pull-right">
                                <button class="btn btn-success btn-round btn-fab btn-fab-mini pull-right" id="btn_reload_ingreso_salida"
                                style="display:none">
                                        <i class="material-icons">cached</i>
                                        <div class="ripple-container"></div>
                                </button>
                            </div> 
                        </h4>
                        <div class="row">
                            <div class="col-md-1 col-xs-4">
                                <div class="dropdown">
                                <button href="#pablo" class="dropdown-toggle btn btn-xs btn-round
                                 btn-danger btn-block" data-toggle="dropdown" aria-expanded="false">PDF
                                    <b class="caret"></b>
                                    <div class="ripple-container"></div>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li class="dropdown-header">Seleccionar</li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="asistencias/pdf/ingreso-salida/hoy" target="__blank">hoy</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="asistencias/pdf/ingreso-salida/semanal" target="__blank">semanal</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="asistencias/pdf/ingreso-salida/quincenal" target="__blank">quincenal</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="asistencias/pdf/ingreso-salida/mensual" target="__blank">mensual</a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                            <div class="col-md-1 col-xs-4">
                                <div class="dropdown">
                                <button href="#pablo" class="dropdown-toggle btn btn-xs btn-round
                                 btn-success btn-block" data-toggle="dropdown" aria-expanded="false">XLSX
                                    <b class="caret"></b>
                                    <div class="ripple-container"></div>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-left">
                                    <li class="dropdown-header">Seleccionar</li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="asistencias/excel/ingreso-salida/hoy">hoy</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="asistencias/excel/ingreso-salida/semanal">semanal</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="asistencias/excel/ingreso-salida/quincenal">quincenal</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="asistencias/excel/ingreso-salida/mensual">mensual</a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <form class="navbar-form navbar-right" role="search" autocomplete="off"
                                id="form-search-ingreso-salida">
                                    <div class="form-group form-search label-floating is-empty has-success h-ingreso-salida-nombre">
                                        <label class="control-label">Nombre</label>
                                        <input type="text" class="form-control" name="search_ingreso_salida_nombre" 
                                        id="search_ingreso_salida_nombre" required>
                                        <span class="matterial-input"></span>
                                    </div>
                                    <div class="form-group form-search label-floating is-empty has-success h-ingreso-salida-apellido">
                                        <label class="control-label">Apellido</label>
                                        <input type="text" class="form-control" name="search_ingreso_salida_apellido" 
                                        id="search_ingreso_salida_apellido" required>
                                        <span class="matterial-input"></span>
                                    </div>
                                    <div class="form-group form-search label-floating is-empty has-success">
                                        <input type="date" class="form-control" name="search_ingreso_salida_fecha"
                                        id="search_ingreso_salida_fecha" required>
                                        <span class="material-input"></span>
                                    </div>
                                    <button type="submit" class="btn btn-just-icon btn-round btn-success">
                                        <i class="material-icons">search</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="table-ingreso-salida">
                                <h1 style="display:none" id="load">Cargando...</h1>
                        </div>
                        <div class="table-ingreso-salida-ajax">
                                <h1 style="display:none" id="load">Cargando...</h1>
                        </div>
                     </div>   
                </div>
            </div>
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

    $('.selectpicker').selectpicker({
      size: 3  
    })
})

function readIngreso(){
    let url = 'asistencias/readIngreso';
    $.ajax({
        url: url,
        method: 'get',
        datatype: 'html',
        beforesend: function(){
            // $('#load').show()
        },
        success: function(data){
            $('.table-ingreso').html(data)
            $('#table-ingreso-ajax').hide()
        }
    })
}

readIngreso()

function searchIngreso(){
    $('#form-search-ingreso').on('submit', function(e){
        e.preventDefault()
        let search_ingreso = $('#search_ingreso').val();
        let fecha_ingreso = $('#fecha_ingreso').val();
        let url1 = 'asistencias/searchIngreso';
        let url2 = 'asistencias/searchIngreso/'+fecha_ingreso;
        let url3 = 'asistencias/searchIngresoFecha/'+fecha_ingreso+'/'+search_ingreso;
        if(search_ingreso == '' && fecha_ingreso == ''){
            readIngreso()
        }
        else if(search_ingreso && fecha_ingreso == ''){
            $.ajax({
                url: url1,
                data: {
                    search_ingreso: search_ingreso
                },
                method: 'get',
                datatype: 'json',
                beforeSend: function(){
                    $('#cargando').show('slow')
                },
                success: function(data){
                    console.log(fecha_ingreso)
                    $('.table-ingreso-ajax').html(data)
                    $('#table-ingreso').hide()
                    $('#btn-add-ingreso').hide()
                    $('#btn-load-ingreso').show()
                }
            })
        }
        else if(search_ingreso == '' && fecha_ingreso){
            $.ajax({
                url: url2,
                data: {
                    fecha_ingreso: fecha_ingreso
                },
                method: 'get',
                datatype: 'json',
                beforeSend: function(){
                    $('#cargando').show('slow')
                },
                success: function(data){
                    console.log(fecha_ingreso)
                    $('.table-ingreso-ajax').html(data)
                    $('#table-ingreso').hide()
                    $('#btn-add-ingreso').hide()
                    $('#btn-load-ingreso').show()
                }
            })
        }
        else if(search_ingreso && fecha_ingreso){
            $.ajax({
                url: url3,
                data: {
                    search_ingreso: search_ingreso,
                    fecha_ingreso: fecha_ingreso
                },
                method: 'get',
                datatype: 'json',
                beforeSend: function(){
                    $('#cargando').show('slow')
                },
                success: function(data){
                    console.log(fecha_ingreso)
                    $('.table-ingreso-ajax').html(data)
                    $('#table-ingreso').hide()
                    $('#btn-add-ingreso').hide()
                    $('#btn-load-ingreso').show()
                }
            })
        }
    })
}

searchIngreso()

function validateIngreso(){
    $('#empleado').on('change', function(){
        let empleado = $(this).val();
        let url = 'asistencias/validateIngreso';
        $.ajax({
            url: url,
            data: {
                empleado: empleado
            },
            method: 'get',
            datatype: 'json',
            success: function(response){
                if(response == 'registrada'){
                    $('#add-ingreso').prop('disabled',true)
                    $('#error_empleado').show().css('color','red')
                }else{
                    $('#add-ingreso').prop('disabled',false)  
                    $('#error_empleado').hide()
                }
            }
        })
    })
}

validateIngreso()

function createIngreso(){
    $('#btn-add-ingreso').on('click', function(){
        $('.selectpicker').val('default').selectpicker("refresh")
        $('#add-ingreso').prop('disabled',false)  
        $('#error_empleado').hide()
        $('#modal-add-ingreso').modal('show')
    })

    $('#form-add-ingreso').on('submit', function(e){
        e.preventDefault();
        let empleado = $('#empleado').val();
        let nom_empleado = $('#empleado option:selected').text();
        let url = 'asistencias/createIngreso';
        $.ajax({
            url: url,
            data: {
                empleado: empleado
            },
            method: 'post',
            datatype: 'json',
            success: function(data){
                $('#modal-add-ingreso').modal('hide')
                toastr.success('Registrado exitosamente','Ingreso: '+nom_empleado)
                $('#search-ingreso').val('')
                readIngreso()
            }
        })
    })
}

createIngreso()

function loadIngreso(){
    $('#btn-load-ingreso').on('click', function(){
        $('.h-ingreso-nombre').removeClass('is-focused')
        $('.h-ingreso-nombre').addClass('is-empty')
        $('#search_ingreso').val('')
        $('#fecha_ingreso').val('')
        $('#btn-add-salida').show()
        $('#btn-load-ingreso').hide()
        $('#result-ingreso').hide()
        readIngreso()
    })
}

loadIngreso()

function readSalida(){
    let url = 'asistencias/readSalida';
    $.ajax({
        url: url,
        method: 'get',
        datatype: 'html',
        success: function(data){
            $('.table-salida').html(data)
            $('#table-salida-ajax').hide()
        }
    })
}

readSalida()

function searchSalida(){
    $('#search_salida_nombre').on('keyup', function(){
        let ssn = $(this).val();
        if(ssn.length){
            $('#s_s_a').show()
        }else{
            $('#s_s_a').hide()
            $('#search_salida_apellido').val('')
        }
    })

    $('#form-search-salida').on('submit', function(e){
        e.preventDefault();
        let nombre = $('#search_salida_nombre').val();
        let apellido = $('#search_salida_apellido').val();
        let url = 'asistencias/searchSalida/'+nombre;
        let url1 = 'asistencias/searchSalida/'+apellido;
        let url2 = 'asistencias/searchSalida/'+nombre+'/'+apellido;

        if (nombre == '' && apellido == '') {
            readSalida()
        } 

        else if(nombre && apellido == ''){
            $.ajax({
                url: url,
                data: {
                    nombre: nombre
                },
                method: 'get',
                datatype: 'json',
                beforeSend: function(){

                },
                success: function(data){
                    $('.table-salida-ajax').html(data)
                    $('#table-salida').hide()
                }
            }) 
        } 
        
        else if(nombre == '' && apellido){
            $.ajax({
                url: url1,
                data: {
                    apellido: apellido
                },
                method: 'get',
                datatype: 'json',
                beforeSend: function(){

                },
                success: function(data){
                    $('.table-salida-ajax').html(data)
                    $('#table-salida').hide()
                    $('#btn-add-salida').hide()
                    $('#btn-load-salida').show()
                }
            })
        }

        else if(nombre && apellido){
            $.ajax({
                url: url2,
                data: {
                    nombre: nombre,
                    apellido: apellido
                },
                method: 'get',
                datatype: 'json',
                beforeSend: function(){

                },
                success: function(data){
                    $('.table-salida-ajax').html(data)
                    $('#table-salida').hide()
                    $('#btn-add-salida').hide()
                    $('#btn-load-salida').show()
                }
            })
        }
    })
}

searchSalida()

function loadSalida(){
    $('#btn-load-salida').on('click', function(){
        $('.h-salida-apellido').hide('is-focused')
        $('.h-salida-nombre').removeClass('is-focused')
        $('.h-salida-apellido').removeClass('is-focused')
        $('.h-salida-nombre').addClass('is-empty')
        $('.h-salida-apellido').addClass('is-empty')
        $('#search_salida_nombre').val('')
        $('#search_salida_apellido').val('')
        $('#btn-add-salida').show()
        $('#btn-load-salida').hide()
        // $('#result-ingreso').hide()
        readSalida()
    })
}

loadSalida()

function createSalida(){
    $('#btn-add-salida').on('click', function(){
        $('#empleado_salida').val('default').selectpicker("refresh")
        $('#error_empleado_salida_1').hide()
        $('#error_empleado_salida_2').hide()
        $('#error_empleado_salida_3').hide()
        $('#add-salida').show()
        $('#add-salida').prop('disabled',false)
        $('#modal-add-salida').modal('show')        
        // toastr.success('sssss','dadasd')
    })

    $('#form-add-salida').on('submit', function(e){
        e.preventDefault()
        let empleado = $('#empleado_salida').val();
        let nom_empleado = $('#empleado_salida option:selected').text();
        let url = 'asistencias/createSalida';
        $.ajax({
            url: url,
            data: {
                empleado_salida : empleado
            },
            method: 'post',
            datatype: 'json',
            success: function(data){
                $('#modal-add-salida').modal('hide')
                toastr.success('Registrada exitosamente','Salida: '+nom_empleado)
                readSalida()
                $('#empleado_salida').val('default').selectpicker("refresh")
                $('#search-salida').val('')
                readIngresoSalida()
            }
        })
    })
}

createSalida()

function validateSalida(){
    $('#empleado_salida').on('change', function(){
        let empleado = $('#empleado_salida').val();
        let url = 'asistencias/validateSalida';
        $.ajax({
            url: url,
            data: {
                empleado_salida: empleado
            },
            method: 'get',
            datatype: 'json',
            success: function(response){
                if (response == '') {
                    $('#error_empleado_salida_1').show().css('color','red')
                    $('#error_empleado_salida_2').hide()
                    $('#error_empleado_salida_3').hide()
                    $('#add-salida').show()
                    $('#add-salida').prop('disabled',true)
                }
                else if (response == 'ingreso') {
                    $('#error_empleado_salida_1').hide()
                    $('#error_empleado_salida_2').show().delay(1000).fadeOut().css('color','green')
                    $('#error_empleado_salida_3').hide()
                    $('#add-salida').show()
                    $('#add-salida').prop('disabled',false)
                }
                else {
                    if (response === 'ingresosalida') {
                        $('#error_empleado_salida_1').hide()
                        $('#error_empleado_salida_2').hide()
                        $('#error_empleado_salida_3').show().css('color','red')
                        $('#add-salida').hide()
                    }
                }
            }
        })
    })
}

validateSalida()

function readIngresoSalida(){
    let url = 'asistencias/readIngresoSalida';
    $.ajax({
        url: url,
        method: 'get',
        datatype: 'html',
        success: function(data){
            $('.table-ingreso-salida').html(data)
            $('#table-ingreso-salida-ajax').hide()
        }
    })
}

readIngresoSalida()

function searchIngresoSalida(){
    $('#form-search-ingreso-salida').on('submit', function(e){
        e.preventDefault();
        let nombre = $('#search_ingreso_salida_nombre').val();
        let apellido = $('#search_ingreso_salida_apellido').val();
        let fecha = $('#search_ingreso_salida_fecha').val();
        let url = 'asistencias/search/ingreso-salida/'+nombre+'/'+apellido+'/'+fecha;
        $.ajax({
            url: url,
            data: {
                nombre: nombre,
                fecha: fecha
            },
            method: 'get',
            datatype: 'html',
            success: function(data){
                $('.table-ingreso-salida-ajax').html(data)
                $('#table-ingreso-salida').hide()
                $('#btn_reload_ingreso_salida').show()
            }
        })
    })
}

searchIngresoSalida()

function reloadIngresoSalida(){
    $('#btn_reload_ingreso_salida').on('click', function(){
        $('.h-ingreso-salida-nombre').removeClass('is-focused');
        $('.h-ingreso-salida-apellido').removeClass('is-focused');
        $('.h-ingreso-salida-nombre').addClass('is-empty');
        $('.h-ingreso-salida-apellido').addClass('is-empty');
        $('#search_ingreso_salida_nombre').val('');
        $('#search_ingreso_salida_apellido').val('');
        $('#search_ingreso_salida_fecha').val('');
        readIngresoSalida()
        $('#search-ingreso-salida').hide()
        $('#btn_reload_ingreso_salida').hide()
    })
}

reloadIngresoSalida()
</script>
@endsection
