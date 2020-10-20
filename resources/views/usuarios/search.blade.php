@if(count($usuarios) > 0)
<div class="table-responsive" id="table-user-ajax">
    <table class="table table-hover">
        <thead class="text-success">
            <tr>
                <th>Nombre:</th>
                <th>Apellido:</th>
                <th>Email:</th>
                <th>Acciones:</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $user)
            <tr>
                <td>{{$user->nombre}}</td>
                <td>{{$user->apellido}}</td>
                <td>{{$user->email}}</td>
                <td class="td-actions text-center">
                    <button type="button" class="btn btn-facebook btn-simple" id-user="{{$user->id}}"
                    id="btn-edit">
                        <i class="material-icons">edit</i>
                    </button>
                    <button type="button" class="btn btn-warning btn-simple" id-user="{{$user->id}}"
                    id="btn-show">
                        <i class="material-icons">visibility</i>
                    </button>
                    <button type="button" name-user="{{$user->nombre}}" id-user="{{$user->id}}" 
                    class="btn btn-danger btn-simple" id="btn-delete">
                        <i class="material-icons">delete</i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@else
<div class="tim-tipo">
    <p>No se encontraron resultados con <b>{{$search}}</b></p>
</div>
@endif