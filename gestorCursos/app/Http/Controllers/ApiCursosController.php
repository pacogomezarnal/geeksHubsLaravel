<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos;

class ApiCursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Cursos::all();

        return $cursos;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();

        $curso=new Cursos();
        $curso->titulo=$data["titulo"];

        $curso->save();

        return $curso;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $curso = Cursos::find($id);

        return $curso;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTitulo($titulo)
    {
        $curso = Cursos::where('titulo',$titulo);

        return $curso;
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
        $data=$request->all();

        $curso=Cursos::find($id);
        if($request->has('titulo')) $curso->titulo=$data["titulo"];
        if($request->has('descripcion')) $curso->descripcion=$data["descripcion"];
        if($request->has('numMaxAlumnos')) $curso->numMaxAlumnos=$data["numMaxAlumnos"];

        $curso->save();

        return $curso;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=Cursos::find($id);
        $curso->delete();

        return Cursos::all();
    }
}
