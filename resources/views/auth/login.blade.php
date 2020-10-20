<!doctype html>
<html lang="es">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>MDSCC</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS     -->
    <link href="{{asset('material/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('material/css/material-dashboard.css')}}" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('material/css/demo.css')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <style>
    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
        display:none;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <b class="navbar-brand">MDSCC</b>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="register">
                        <a id="btn-register" data-toggle="collapse" href="#pageRegister">
                            <i class="material-icons">person_add</i> Registrar
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="login active" data-toggle="collapse" href="#pageLogin">
                        <a id="btn-login">
                            <i class="material-icons">fingerprint</i> Iniciar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="{{asset('material/img/login.jpg')}}">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content" id="login">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form id="form-login" method="POST" action="{{route('login')}}" autocomplete="off">
                            {{ csrf_field() }}
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="blue">
                                        <h4 class="card-title">Iniciar Sesión</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating has-blue">
                                                <label class="control-label">Email</label>
                                                <input type="email" name="email" class="form-control" value="diego10@gmail.com">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Password</label>
                                                <input type="password" name="password" class="form-control" value="diego10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-info btn-round">
                                            <i class="material-icons">input</i> Ingresar
                                            <div class="ripple-container"></div>
                                        </button>
                                        <!-- <div class=" text-center">
                                        No tienes cuenta? <a id="btn-register" href="#">Registrate</a>
                                        </div> -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content" id="register" style="display:none">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form id="form-register" method="POST" action="{{route('register')}}" autocomplete="off">
                            {{ csrf_field() }}
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="green">
                                        <h4 class="card-title">Registrar</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">account_box</i>
                                            </span>
                                            <div class="form-group label-floating is-empty has-success h-nombre">
                                                <label class="control-label" id="l_nombre">Nombre</label>
                                                <input type="text" name="nombre" id="nombre" class="form-control" min-length="5" required>
                                                <span class="help-block pull-left" id="error_nombre_1" style="display:none">Ingrese su nombre</span>
                                                <span class="help-block pull-left" id="error_nombre_2" style="display:none">Ingrese al menos 10 caracteres</span>
                                                <span class="material-icons form-control-feedback" style="display:none" id="nombre_check">done</span>
                                                <span class="material-icons form-control-feedback" style="display:none" id="nombre_error">clear</span>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">recent_actors</i>
                                            </span>
                                            <div class="form-group label-floating is-empty has-success h-apellido">
                                                <label class="control-label" id="l_apellido">Apellido</label>
                                                <input type="text" name="apellido" id="apellido" class="form-control" required>
                                                <span class="help-block pull-left" id="error_apellido_1" style="display:none">Ingrese su apellido</span>
                                                <span class="help-block pull-left" id="error_apellido_2" style="display:none">Ingrese al menos 10 caracteres</span>
                                                <span class="material-icons form-control-feedback" style="display:none" id="apellido_check">done</span>
                                                <span class="material-icons form-control-feedback" style="display:none" id="apellido_error">clear</span>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating is-empty has-success h-email">
                                                <label class="control-label" id="l_email">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" required>
                                                <span class="help-block pull-left" id="error_email_1" style="display:none">Ingrese su email</span>
                                                <span class="help-block pull-left" id="error_email_2" style="display:none">Ingrese un email valido</span>
                                                <span class="help-block pull-left" id="error_email_3" style="display:none">El email no esta disponible</span>
                                                <span class="help-block pull-left" id="error_email_4" style="display:none">El email esta disponible</span>
                                                <span class="material-icons form-control-feedback" style="display:none" id="email_check">done</span>
                                                <span class="material-icons form-control-feedback" style="display:none" id="email_error">clear</span>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating is-empty has-success h-password">
                                                <label class="control-label" id="l_password">Password</label>
                                                <input type="password" name="password" id="password" class="form-control" required>
                                                <span class="help-block pull-left" id="error_password_1" style="display:none">Ingrese su contraseña</span>
                                                <span class="help-block pull-left" id="error_password_2" style="display:none">Ingrese al menos 8 caracteres</span>
                                                <span class="help-block pull-left" id="error_password_3" style="display:none">---</span>
                                                <span class="material-icons form-control-feedback" style="display:none" id="password_check">done</span>
                                                <span class="material-icons form-control-feedback" style="display:none" id="password_error">clear</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-success btn-round" id="user_register">
                                            <i class="material-icons">input</i> registrarme
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <p class="copyright pull-right">
                        &copy;  
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <b>MDSCC</b>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<!--   Core JS Files   -->
<script src="{{asset('material/js/jquery-3.1.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material/js/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material/js/material.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{asset('material/js/jquery.validate.min.js')}}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{asset('material/js/moment.min.js')}}"></script>
<!--  Charts Plugin -->
<script src="{{asset('material/js/chartist.min.js')}}"></script>
<!--  Plugin for the Wizard -->
<script src="{{asset('material/js/jquery.bootstrap-wizard.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('material/js/bootstrap-notify.js')}}"></script>
<!--   Sharrre Library    -->
<script src="{{asset('material/js/jquery.sharrre.js')}}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{asset('material/js/bootstrap-datetimepicker.js')}}"></script>
<!-- Vector Map plugin -->
<script src="{{asset('material/js/jquery-jvectormap.js')}}"></script>
<!-- Sliders Plugin -->
<script src="{{asset('material/js/nouislider.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="{{asset('material/js/jquery.select-bootstrap.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<!--  DataTables.net Plugin    -->
<script src="{{asset('material/js/jquery.datatables.js')}}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{asset('material/js/sweetalert2.js')}}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{asset('material/js/jasny-bootstrap.min.js')}}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{asset('material/js/fullcalendar.min.js')}}"></script>
<!-- TagsInput Plugin -->
<script src="{{asset('material/js/jquery.tagsinput.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('material/js/material-dashboard.js')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('material/js/demo.js')}}"></script>
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})

function register(){
    $('#btn-register').click(function(){
        $('#login').fadeOut();
        $('.login').removeClass('active');
        $('#register').fadeIn('slow');
        $('.register').addClass('active');
    })
}

register()

$('#btn-login').click(function(){
    $('#login').fadeIn();
    $('.login').addClass('active');
    $('#register').fadeOut();
    $('.register').removeClass('active');
})

function validateRegistro(){
    $('#nombre').on('keyup', function(){
        let nom = $(this).val();
        let nombre = nom.trim();
        if(nombre == ""){
            $('.h-nombre').removeClass('has-success')
            $('.h-nombre').addClass('has-danger')
            $('#l_nombre').css('color','red');
            $('#nombre').css({'color':'red','border-color':'red'})
            $('#error_nombre_1').show()
            $('#error_nombre_1').css('color','red')
            $('#error_nombre_2').hide()
            $('#nombre_error').show()
            $('#nombre_check').hide()
        }else if(nombre.length < 10){
            $('.h-nombre').removeClass('has-success')
            $('.h-nombre').addClass('has-danger')
            $('#l_nombre').css('color','red')
            $('#nombre').css('color','red')
            $('#error_nombre_2').show()
            $('#error_nombre_2').css('color','red')
            $('#error_nombre_1').hide()
            $('#nombre_error').show()
            $('#nombre_check').hide()
        }else{
            $('.h-nombre').addClass('has-success')
            $('#l_nombre').css('color','')
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
            $('#l_apellido').css('color','red')
            $('#apellido').css({'color':'red','border-color':'red'})
            $('#error_apellido_1').show()
            $('#error_apellido_1').css('color','red')
            $('#error_apellido_2').hide()
            $('#apellido_error').show()
            $('#apellido_check').hide()
        }else if(apellido.length < 10){
            $('.h-apellido').removeClass('has-success')
            $('.h-apellido').addClass('has-danger')
            $('#l_apellido').css('color','red')
            $('#apellido').css('color','red')
            $('#error_apellido_2').show()
            $('#error_apellido_2').css('color','red')
            $('#error_apellido_1').hide()
            $('#apellido_error').show()
            $('#apellido_check').hide()
        }else{
            $('.h-apellido').addClass('has-success')
            $('#l_apellido').css('color','')
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
        let url = 'registrar/validateEmail';
        if(email == ""){
            $('.h-email').removeClass('has-success')
            $('.h-email').addClass('has-danger')
            $('#l_email').css('color','red')
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
            $('#l_email').css('color','red')
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
                    $('#l_email').css('color','red')
                    $('#email').css({'color':'red','border-color':'red'})
                    $('#error_email_1').hide()
                    $('#error_email_2').hide()
                    $('#error_email_3').show()
                    $('#error_email_3').css('color','red')
                    $('#error_email_4').hide()
                    $('#email_error').show()
                    $('#email_error').show()
                    $('#email_check').hide()
                    $('#user_register').prop('disabled',true)
                }else{
                    $('.h-email').addClass('has-success')
                    $('#l_email').css('color','');
                    $('#email').css({'color':'','border-color':''})
                    $('#error_email_1').hide()
                    $('#error_email_2').hide()
                    $('#error_email_3').hide()
                    $('#error_email_4').show()
                    $('#error_email_4').css('color','green')                    
                    $('#email_error').hide()
                    $('#email_check').show()
                    $('#user_register').prop('disabled',false);
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
            $('#l_password').css('color','red')
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
            $('#l_password').css('color','red')
            $('#password').css('color','red')
            $('#error_password_2').show()
            $('#error_password_2').css('color','red')
            $('#error_password_1').hide()
            $('#password_error').show()
            $('#password_check').hide()
        }else{
            $('.h-password').addClass('has-success')
            $('#l_password').css('color','')
            $('#password').css({'color':'','border-color':''})
            $('#error_password_1').hide()
            $('#error_password_2').hide()
            $('#password_error').hide()
            $('#password_check').show()
        }
    })
}

validateRegistro()

function registrar(){
    $('#form-register').on('submit', function(e){
        e.preventDefault();
        let nombre = $('#nombre').val();
        let apellido = $('#apellido').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let url = '/registrar';
        $.ajax({
            url: url,
            data: {
                nombre: nombre,
                apellido: apellido,
                email: email,
                password: password,
            },
            method: 'post',
            datatype: 'json',
            success: function(data){
                $('#register').fadeOut();
                toastr.success('Registrado exitosamente',''+nombre)
                toastr.success('Ya puede iniciar sesión',''+nombre)
                $('#login').fadeIn();
                $('#form-register').trigger('reset')
            }
        })
    })
}

registrar()
</script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->
</html>