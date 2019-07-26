<?php

namespace App\Http\Controllers\Scores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use App\Score;

class ScoresController extends Controller
{
    public function store(Request $request)
    {
          $rules = [
            'id_t_materias' => 'required',
            'id_t_usuarios' => 'required',
            'calificacion' => 'required|numeric|between:0.00,99.99',
            'fecha_registro' => 'nullable|date',
          ];
          $this->validate($request, $rules);
          $data = $request->all();
          $data['id_t_materias'] = $request->id_t_materias;
          $data['id_t_usuarios'] = $request->id_t_usuarios;
          $data['calificacion'] = $request->calificacion;
          $data['fecha_registro'] = new DateTime();
          $score = Score::create($data);
          return response()->json(['success' => 'ok','msg' => 'calificacion registrada'], 201);
    }
    public function update(Request $request, $id)
    {
        $grade = Score::findOrFail($id);
        $rules = [
          'id_t_materias' => 'required',
          'id_t_usuarios' => 'required',
          'calificacion' => 'required|numeric|between:0.00,99.99',
        ];
        if ($request->has('id_t_materias') && $grade->id_t_materias != $request->id_t_materias) {
          $grade->id_t_materias = $request->id_t_materias;
        }
        if ($request->has('id_t_usuarios') && $grade->id_t_usuarios != $request->id_t_usuarios) {
          $grade->id_t_usuarios = $request->id_t_usuarios;
        }
        if ($request->has('calificacion') && $grade->calificacion != $request->calificacion) {
          $grade->calificacion = $request->calificacion;
        }
        $grade->save();
        return response()->json(['success' => 'ok','msg' => 'calificacion actualizada'], 200);
    }

    public function destroy($id)
    {
          $grade = Score::findOrFail($id);
          $grade->delete();
          return response()->json(['success' => 'ok','msg' => 'calificacion eliminada'], 200);
    }
}
