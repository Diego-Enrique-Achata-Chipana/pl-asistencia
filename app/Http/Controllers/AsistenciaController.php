<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AsistenciaExport;
use App\Exports\AsistenciaUserSemanalExport;
use App\Exports\AsistenciaUserQuincenalExport;
use App\Exports\AsistenciaUserMensualExport;
use App\Exports\AsistenciaHoyExport;
use App\Exports\AsistenciaSemanalExport;
use App\Exports\AsistenciaQuincenalExport;
use App\Exports\AsistenciaMensualExport;
use App\User;
use App\Asistencia;
use Carbon\Carbon;
use DB;
use PDF;
use Excel;

class AsistenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
   {
       $usuarios = User::select('id','nombre','apellido','slug')
                        ->orderby('nombre','asc')
                        ->get();
       return view('asistencias.ingreso.index',compact('usuarios'));
   }

   public function readIngreso()
   {
       $asistencia_ingreso = DB::table('asistencias as a')
                                ->join('users as u','a.user_id','=','u.id')
                                ->select('u.nombre as nombre','u.apellido as apellido','u.slug as slug','a.fecha as fecha','a.hora as hora','u.id as uid')
                                ->where('a.turno','=','1')
                                ->orderby('a.id','desc')
                                ->take(5)
                                ->get();
        return view('asistencias.ingreso.read',compact('asistencia_ingreso')); 
   }

   public function searchIngreso(Request $request)
   {
        if ($request->search_ingreso) {
            $search = $request->search_ingreso;
            $asistencia_ingreso = DB::table('asistencias as a')
                            ->join('users as u','a.user_id','=','u.id')
                            ->select('u.nombre as nombre','u.apellido as apellido','u.slug as slug','a.fecha as fecha','a.hora as hora','u.id as uid')
                            ->where('a.turno','=','1')
                            ->where('u.nombre','like','%'.$search.'%')
                            ->orwhere('u.apellido','like','%'.$search.'%')
                            ->orderby('a.id','desc')
                            ->take(5)
                            ->get();
            return view('asistencias.ingreso.search',compact('search','asistencia_ingreso'));
        }
       
   }

   public function searchIngresoFecha(String $fecha_ingreso, String $search_ingreso = null)
   {

        $user = $search_ingreso;
        $fecha = $fecha_ingreso;
        $asistencia_ingreso = DB::table('asistencias as a')
                            ->join('users as u','a.user_id','=','u.id')
                            ->select('u.nombre as nombre','u.apellido as apellido','u.slug as slug','a.fecha as fecha','a.hora as hora','u.id as uid')
                            ->where('a.turno','=','1')
                            ->where('u.nombre','like','%'.$user.'%')
                            ->where('a.fecha',$fecha)
                            ->orderby('a.id','desc')
                            ->get();
        return view('asistencias.ingreso.search_fecha',compact('user','fecha','asistencia_ingreso'));
   }

   public function createIngreso(Request $request)
   {
        if($request->ajax())
        {
            $asistencia_ingreso = new Asistencia;
            $fecha = Carbon::now();
            $asistencia_ingreso->user_id = $request->get('empleado'); 
            $asistencia_ingreso->turno = '1'; 
            $asistencia_ingreso->fecha = $fecha->ToDateString(); 
            $asistencia_ingreso->hora = $fecha->ToTimeString(); 
            $asistencia_ingreso->save(); 
        }
   }

   public function validateIngreso(Request $request)
   {
        if($request->get('empleado')){
            $user = $request->get('empleado');
            $fecha = Carbon::now();
            $fecha = $fecha->ToDateString();
            $query = DB::table('asistencias as a')
                        ->join('users as u','a.user_id','=','u.id')
                        ->where('u.id','=',$user)
                        ->where('a.fecha','=',$fecha)
                        ->where('a.turno','=','1')
                        ->count();
            if($query > 0){
                echo 'registrada';
            }else{
                echo 'no registrada';
            }
        }
   }

   public function readSalida()
   {
       $asistencia_salida = DB::table('asistencias as a')
                                ->join('users as u','a.user_id','=','u.id')
                                ->select('u.nombre as nombre','u.apellido as apellido','u.slug as slug','a.fecha as fecha','a.hora as hora','u.id as uid')
                                ->where('a.turno','=','2')
                                ->orderby('a.id','desc')
                                ->take(5)
                                ->get();
        return view('asistencias.salida.read',compact('asistencia_salida')); 
   }

   public function searchSalida(string $nombre = null, string $apellido = null)
   {
        if($nombre){
            $search = $nombre;
            $search1 = $apellido;
            $asistencia_salida = DB::table('asistencias as a')
                                ->join('users as u','a.user_id','=','u.id')
                                ->select('u.nombre as nombre','u.apellido as apellido','u.slug as slug','a.fecha as fecha','a.hora as hora','u.id as uid')
                                ->where('a.turno','=','2')
                                ->where('u.nombre','like','%'.$search.'%')
                                ->orderby('a.id','desc')
                                ->take(5)
                                ->get();
            return view('asistencias.salida.search',compact('search','search1','asistencia_salida'));
        }
        else if($nombre && $apellido){
            $search = $nombre;
            $search1 = $apellido;
            $asistencia_salida = DB::table('asistencias as a')
                                ->join('users as u','a.user_id','=','u.id')
                                ->select('u.nombre as nombre','u.apellido as apellido','u.slug as slug','a.fecha as fecha','a.hora as hora','u.id as uid')
                                ->where('a.turno','=','2')
                                ->where('u.nombre','like','%'.$search.'%')
                                ->where('u.apellido','like','%'.$search1.'%')
                                ->orderby('a.id','desc')
                                ->take(5)
                                ->get();
            return view('asistencias.salida.search',compact('search','search1','asistencia_salida'));
        }
   }

   public function createSalida(Request $request)
   {
        if($request->ajax())
        {
            $asistencia_salida = new Asistencia;
            $fecha = Carbon::now();
            $asistencia_salida->user_id = $request->get('empleado_salida'); 
            $asistencia_salida->turno = '2'; 
            $asistencia_salida->fecha = $fecha->ToDateString(); 
            $asistencia_salida->hora = $fecha->ToTimeString(); 
            $asistencia_salida->save(); 
        }
   }

   public function validateSalida(Request $request)
   {
       if ($request->empleado_salida) {
           $user = $request->get('empleado_salida');
           $fecha = Carbon::now();
           $fecha = $fecha->ToDateString();
           $query = DB::table('asistencias as a')
                        ->join('users as u','a.user_id','=','u.id')
                        ->where('a.turno','=','1')
                        ->where('u.id','=',$user)
                        ->where('a.fecha','=',$fecha)
                        ->count();

            $query1 = DB::table('asistencias as a')
                        ->join('users as u','a.user_id','=','u.id')
                        ->where('a.turno','=','2')
                        ->where('u.id','=',$user)
                        ->where('a.fecha','=',$fecha)
                        ->count();
            if($query > 0){
                echo 'ingreso';
            }
            
            if($query1 > 0){
                echo 'salida';
            }

            // if ($query && $query1) {
            //     echo 'registrado';
            // }
       }
   }

   public function readIngresoSalida(Request $request)
   {
    $asistencias = DB::select('SELECT T1.EMPLEADO, T1.APELLIDO, T1.FECHA, T1.INGRESO , T2.SALIDA, T1.USER
                    FROM
                    (
                    SELECT u.nombre as Empleado, u.apellido as Apellido, a.fecha as Fecha,
                    a.hora as Ingreso, u.slug as user
                    FROM asistencias as a
                    INNER JOIN users as u on a.user_id = u.id
                    WHERE a.turno = 1
                    )
                    T1
                    INNER JOIN
                    (
                    SELECT u.nombre as Empleado, a.fecha as Fecha, a.hora as Salida, a.id as aid
                    FROM asistencias as a
                    INNER JOIN users as u on a.user_id = u.id
                    WHERE a.turno = 2	
                    )T2 ON T1.empleado = T2.empleado WHERE T1.Fecha = T2.Fecha ORDER BY T2.aid DESC LIMIT 5');
    return view('asistencias.ingreso-salida.read',compact('asistencias'));
   }
   
   public function searchIngresoSalida(string $nombre, string $apellido, string $fecha)
   {
        $nombre = $nombre;
        $apellido = $apellido;
        $fecha = $fecha;
        $asistencias = DB::select("SELECT T1.EMPLEADO, T1.APELLIDO, T1.FECHA, T1.INGRESO , T2.SALIDA, T1.USER
                    FROM
                    (
                    SELECT u.nombre as Empleado, u.apellido as Apellido, a.fecha as Fecha,
                    a.hora as Ingreso, u.slug as user
                    FROM asistencias as a
                    INNER JOIN users as u on a.user_id = u.id
                    WHERE a.turno = 1
                    )
                    T1
                    INNER JOIN
                    (
                    SELECT u.nombre as Empleado, a.fecha as Fecha, a.hora as Salida, a.id as aid
                    FROM asistencias as a
                    INNER JOIN users as u on a.user_id = u.id
                    WHERE a.turno = 2	
                    )T2 ON T1.empleado = T2.empleado 
                    WHERE T1.fecha = T2.fecha 
                    AND T1.empleado LIKE  '%$nombre%' 
                    AND T1.apellido LIKE  '%$apellido%' 
                    AND T1.fecha = '$fecha' 
                    ORDER BY T2.aid DESC LIMIT 5");
        return view('asistencias.ingreso-salida.search',compact('asistencias','nombre','apellido','fecha'));
   }
   
   public function pdfAsistenciaIngresoSalida(string $opcion)
   {
        $op = $opcion;
        $rs = 'Municipalidad de Santa Cruz de Cocachacra';
        $fecha = Carbon::now()->ToDateString();
        $semanal = Carbon::now()->subdays('7')->ToDateString();
        $quincenal = Carbon::now()->subdays('15')->ToDateString();
        $mensual = Carbon::now()->subdays('30')->ToDateString();
        if($op == 'hoy'){
            $asistencias = DB::select("SELECT T1.EMPLEADO, T1.APELLIDO, T1.FECHA, T1.INGRESO , T2.SALIDA
            FROM
            (
            SELECT u.nombre as Empleado, u.apellido as Apellido, a.fecha as Fecha, a.hora as Ingreso 
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 1
            )
            T1
            INNER JOIN
            (
            SELECT u.nombre as Empleado, a.fecha as Fecha, a.hora as Salida, a.id as aid
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 2	
            )T2 ON T1.empleado = T2.empleado WHERE T1.fecha = T2.fecha AND T1.fecha = '$fecha' ORDER BY T2.aid DESC");
        
            $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
             ])->loadView('asistencias.ingreso-salida.export.pdf.hoy',compact('asistencias','rs','fecha'));
            return $pdf->stream('Asitencia de hoy.pdf');
        }else if($op == 'semanal'){
            $asistencias = DB::select("SELECT T1.EMPLEADO, T1.APELLIDO, T1.FECHA, T1.INGRESO , T2.SALIDA
            FROM
            (
            SELECT u.nombre as Empleado, u.apellido as Apellido, a.fecha as Fecha, a.hora as Ingreso 
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 1
            )
            T1
            INNER JOIN
            (
            SELECT u.nombre as Empleado, a.fecha as Fecha, a.hora as Salida, a.id as aid
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 2	
            )T2 ON T1.empleado = T2.empleado 
            WHERE T1.fecha = T2.fecha 
            AND T1.fecha BETWEEN '$semanal' AND '$fecha' 
            ORDER BY T2.aid DESC");
        
            $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
            ])->loadView('asistencias.ingreso-salida.export.pdf.semanal',compact('asistencias','rs','fecha','semanal'));
            return $pdf->stream('Asistencia semanal.pdf');

        }else if($op == 'quincenal'){
            $asistencias = DB::select("SELECT T1.EMPLEADO, T1.APELLIDO, T1.FECHA, T1.INGRESO , T2.SALIDA
            FROM
            (
            SELECT u.nombre as Empleado, u.apellido as Apellido, a.fecha as Fecha, a.hora as Ingreso 
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 1
            )
            T1
            INNER JOIN
            (
            SELECT u.nombre as Empleado, a.fecha as Fecha, a.hora as Salida, a.id as aid
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 2	
            )T2 ON T1.empleado = T2.empleado 
            WHERE T1.fecha = T2.fecha 
            AND T1.fecha BETWEEN '$quincenal' AND '$fecha' 
            ORDER BY T2.aid DESC");
        
            $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
            ])->loadView('asistencias.ingreso-salida.export.pdf.quincenal',compact('asistencias','rs','fecha','quincenal'));
            return $pdf->stream('Asistencia quincenal.pdf');

        }else if($op == 'mensual'){
            $asistencias = DB::select("SELECT T1.EMPLEADO, T1.APELLIDO, T1.FECHA, T1.INGRESO , T2.SALIDA
            FROM
            (
            SELECT u.nombre as Empleado, u.apellido as Apellido, a.fecha as Fecha, a.hora as Ingreso 
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 1
            )
            T1
            INNER JOIN
            (
            SELECT u.nombre as Empleado, a.fecha as Fecha, a.hora as Salida, a.id as aid
            FROM asistencias as a
            INNER JOIN users as u on a.user_id = u.id
            WHERE a.turno = 2	
            )T2 ON T1.empleado = T2.empleado 
            WHERE T1.fecha = T2.fecha 
            AND T1.fecha BETWEEN '$mensual' AND '$fecha' 
            ORDER BY T2.aid DESC");
        
            $pdf = PDF::setOptions([
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
            ])->loadView('asistencias.ingreso-salida.export.pdf.mensual',compact('asistencias','rs','fecha','mensual'));
            return $pdf->stream('Asistencia mensual.pdf');

        }
        
   }
//    public function searchEntrada(Request $request)
//    {
//        if($request->search_entrada)
//        {
//             $query = DB::table('asistencias as a')
//                         ->join('users as u','a.user_id','=','u.id')
//                         ->select('u.nombre as nombre','u.apellido as apellido','a.fecha as fecha', 'a.hora as hora','u.id as uid')
//                         ->where('u.nombre','like','%'.$request->search_entrada.'%')
//                         ->where('a.turno','=','1')
//                         ->orderby('a.id', 'desc')
//                         ->get();

//             $e_entrada = "";

//             $data = $query->count();

//             if($data > 0)
//             {
//                 foreach($query as $key => $a_ent){
//                     if($a_ent->hora <= '08:00:00'){
//                         $e_entrada = '<span class="label label-success">temprano</span>';
//                     }else{
//                         $e_entrada = '<span class="label label-danger">tarde</span>';
//                     }

//                     echo "<tr><td>".$a_ent->nombre." ".$a_ent->apellido."</td><td>".$a_ent->fecha."</td><td>".$a_ent->hora."</td><td>".$e_entrada."</td>
//                     <td class='text-center'><a href='asistencias/pdf/".$a_ent->uid."' class='btn btn-danger btn-xs' target='_blank'>PDF</a></td></tr>";
//                 }
//             }else{
//                 echo "<tr><td align='center' colspan='5'>No se encontraron resultados con <b>".$request->search_entrada."</b></td></tr>";
//             }

//        }
//    }

   public function exportExcelAsistenciaSemanal(string $slug)
   {
        return (new AsistenciaExport)->forUser($slug)->download('asistencia_ingreso_semanal.xlsx');
   }

   public function excelAsistenciaSemanal(string $opcion, string $slug)
   {
        $op = $opcion;
        if($op == 'semanal'){
            return (new AsistenciaUserSemanalExport)->forUser($slug)->download('Asistencia Semanal.xlsx');
        }
        else if($op == 'quincenal'){
            return (new AsistenciaUserQuincenalExport)->forUser($slug)->download('Asistencia Quincenal.xlsx');
        }
        else if($op == 'mensual'){
            return (new AsistenciaUserMensualExport)->forUser($slug)->download('Asistencia Mensual.xlsx');
        }
   }

   public function excelAsistenciaIngresoSalidaHoy()
   {
        return (new AsistenciaHoyExport)->download('Asistencia de hoy.xlsx');
   }

   public function excelAsistenciaIngresoSalidaSemanal()
   {
        return (new AsistenciaSemanalExport)->download('Asistencia Semanal.xlsx');
   }

   public function excelAsistenciaIngresoSalidaQuincenal()
   {
        return (new AsistenciaQuincenalExport)->download('Asistencia Quincenal.xlsx');
   }

   public function excelAsistenciaIngresoSalidaMensual()
   {
        return (new AsistenciaMensualExport)->download('Asistencia Mensual.xlsx');
   }
    
   public function exportPDF()
   {
       
   }
}
