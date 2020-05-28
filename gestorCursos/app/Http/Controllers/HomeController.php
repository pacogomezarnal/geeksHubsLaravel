<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cursos;

class HomeController extends Controller
{
    function index(){
        //$cursos=DB::table('curso')->get();
        $cursos=Cursos::all();
        dd($cursos[0]->numMinAlumnos);
        return view('home',['cursosDB'=>$cursos,'nombre'=>"Paco"]);
    }
    function show($id){
        //$curso=DB::table('cursos')->find($id);
        $curso=Cursos::find(1);
        dd($curso);
    }
}
