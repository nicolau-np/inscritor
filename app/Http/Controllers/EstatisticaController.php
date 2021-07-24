<?php

namespace App\Http\Controllers;

use App\AnoLectivo;
use App\Curso;
use App\Turno;
use Illuminate\Http\Request;

class EstatisticaController extends Controller
{
    public function index(){
        $cursos = Curso::pluck('curso', 'id');
        $turnos = Turno::pluck('turno', 'id');
        $ano_lectivos = AnoLectivo::pluck('ano_lectivo', 'id');
        $data = [
            'title' => "Estatísticas",
            'menu' => "Listas",
            'submenu' => "Listar",
            'type' => "estatisticas",
            'config' => null,
            'getCursos' =>$cursos,
            'getTurnos'=>$turnos,
            'getAnosLectivos'=>$ano_lectivos,
        ];
        return view('admin.estatisticas.list', $data);
    }
}
