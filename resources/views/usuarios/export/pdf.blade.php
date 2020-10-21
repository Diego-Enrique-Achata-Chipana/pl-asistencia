<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Empleados</title>
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style>
    thead{
        background: #4682B4;
        color: white;
        text-transform:uppercase;
    }
    .nombre, .apellido{
        text-transform:uppercase;
    }
    h3{
        color: #4682B4;
    }
    p{
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <div class="row">
        <div>
            <b><h3>LISTA DE EMPLEADOS</h3></b>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="" class="pull-left">Razón Social: </label> <p>{{$rs}}</p>
            <label for="" class="pull-left">Fecha: </label><p>{{$fecha}}</p>
        </div>
    </div>
    <!-- <br> -->
    <div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>N°:</th>
                    <th>Nombre:</th>
                    <th>Apellido:</th>
                    <th>Email:</th>
                </tr>
            </thead>
            <tbody>
            @foreach($usuarios as $key =>$user)
                <tr>
                    <td>{{++$key}}</td>
                    <td class="nombre">{{$user->nombre}}</td>
                    <td class="apellido">{{$user->apellido}}</td>
                    <td>{{$user->email}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
