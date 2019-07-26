<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use DB;

class StudentsController extends Controller
{
    public function show($id)
    {
          $grades = DB::table('t_calificaciones')
                    ->select('t_alumnos.id_t_usuarios as id_t_usuario','t_alumnos.nombre','t_alumnos.ap_paterno as apellido','t_materias.nombre as materia', 'calificacion', DB::raw('DATE_FORMAT(fecha_registro, "%d/%m/%Y") as fecha_registro'))
                    ->join('t_alumnos','t_alumnos.id_t_usuarios','=','t_calificaciones.id_t_usuarios')
                    ->join('t_materias','t_materias.id_t_materias','=','t_calificaciones.id_t_materias')
                    ->get();
          $avg = DB::table('t_calificaciones')
                    ->select(DB::raw('round(AVG(calificacion),0) as promedio'))
                    ->join('t_alumnos','t_alumnos.id_t_usuarios','=','t_calificaciones.id_t_usuarios')
                    ->join('t_materias','t_materias.id_t_materias','=','t_calificaciones.id_t_materias')
                    ->get();
          $grades->push($avg->first());
          return response()->json($grades, 200);
    }
}
