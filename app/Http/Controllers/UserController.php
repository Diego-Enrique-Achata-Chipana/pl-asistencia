<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Exports\UsuarioExport;
use App;
use DB;
use PDF;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       return view('usuarios.index');
    }

    public function read()
    {
        $usuarios = User::select('id','nombre','apellido','email','slug')->orderby('id','desc')->take(5)->get();
        return view ('usuarios.read',compact('usuarios'));
    }

    public function searchUser(Request $request)
    {
        if($request->search_user)
        {
            $search = $request->search_user;
            $usuarios = DB::table('users')
                        ->select('id','nombre','apellido','email','slug')
                        ->where('nombre','like','%'.$search.'%')
                        ->orwhere('apellido', 'like','%'.$search.'%')
                        ->orderby('id','desc')
                        ->take(5)
                        ->get();
            
            return view('usuarios.search',compact('usuarios','search'));
        }
    }

    public function validateEmail(Request $request)
    {
        if ($request->get('email'))
        {
            $email = $request->get('email');
            $query = User::whereEmail($email)->count();;
            
            if($query > 0){
                echo 'registrado';
            }else{
                echo 'no registrado';
            }
        }
    }

    public function createUser(Request $request)
    {
        if($request->ajax())
        {
            $usuario = new User;
            $usuario->nombre = $request->get('nombre');
            $usuario->apellido = $request->get('apellido');
            $usuario->slug = str_slug($request->get('nombre').'-'.$request->get('apellido'));
            $usuario->email = $request->get('email');
            $usuario->password = bcrypt($request->get('password'));
            $usuario->save();
        }
        
    }

    public function showUser($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json([
            'id' => $usuario->id,
            'nombre' => $usuario->nombre,
            'apellido' => $usuario->apellido,
            'email' => $usuario->email
        ]);    
    }

    public function editUser($id)
    {
        $usuario = User::findOrFail($id);
        return response()->json([
            'id' => $usuario->id,
            'nombre' => $usuario->nombre,
            'apellido' => $usuario->apellido,
            'email' => $usuario->email
        ]);    
    }

    public function updateUser(Request $request, $id)
    {
        if ($request->ajax()) 
        {
            $usuario = User::findOrFail($id);
            $usuario->nombre = $request->get('nombre');
            $usuario->apellido = $request->get('apellido');
            $usuario->slug = str_slug($request->get('nombre').'-'.$request->get('apellido'));
            $usuario->save();
        }
    }

    public function delete($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        // return response()->json($usuario);
    }

    public function pdfAllUser()
    {
        $rs = 'Municipalidad de Santa Cruz de Cocachacra';
        $fecha = Carbon::now();
        $fecha = $fecha->ToDateString();
        $usuarios = User::select('nombre','apellido','email')
                        ->whereNotIn('id',[1])
                        ->orderby('id','asc')
                        ->get();
        $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])->loadView('usuarios.export.pdf',compact('usuarios','rs','fecha'));
        return $pdf->stream('empleados.pdf');
    }

    public function excelAllUser()
    {
        return (new UsuarioExport)->download('Lista de empleados.xlsx');
    }
}
