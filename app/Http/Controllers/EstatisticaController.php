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

    public function getList(Request $request){
        $request->validate([
            'curso' => ['required', 'integer', 'min:1'],
            'turno' => ['required', 'integer', 'min:1'],
            'ano_lectivo' => ['required', 'integer', 'min:1'],
            'estado' => ['required', 'string', 'min:1', 'max:255'],
        ]);

        if($request->estado == "Todos"){
            //todos
        }elseif($request->estado=="Qualificados"){
            //qualificados
        }elseif($request->estado=="Não Qualificados"){
            //nao qualificados
        }
        $lista = [
            [
                'nome'=>"Libra"
            ],[
                'nome'=>"euro"
            ],
        ];
        return back()->with(['getLista'=>$lista, 'success'=>"pesquisa Feita"]);
    }
}