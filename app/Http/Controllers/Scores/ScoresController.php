<?php

namespace App\Http\Controllers\Scores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use App\Score;

class ScoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
