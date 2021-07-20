<?php

namespace App\Http\Controllers;

use App\AnoLectivo;
use App\Curso;
use App\Estudante;
use App\Pessoa;
use App\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_instituicao = Auth::user()->id_instituicao;
        $estudantes = Estudante::where(['id_instituicao'=>$id_instituicao])->paginate(6);
        $data = [
            'title' => "Estudantes",
            'menu' => "Estudante",
            'submenu' => "Listar",
            'type' => "estudante",
            'config' => null,
            'getEstudantes'=>$estudantes,
        ];
        return view('admin.estudante.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::where(['estado'=>"on"])->pluck('curso', 'id');
        $turnos = Turno::where(['estado'=>"on"])->pluck('turno', 'id');
        $anos_lectivos = AnoLectivo::where(['estado'=>"on"])->pluck('ano_lectivo', 'id');

        $data = [
            'title' => "Estudantes",
            'menu' => "Estudante",
            'submenu' => "Novo",
            'type' => "estudante",
            'config' => null,
            'getCursos'=>$cursos,
            'getTurnos'=>$turnos,
            'getAnosLectivos'=>$anos_lectivos,
        ];
        return view('admin.estudante.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'genero' => ['required', 'string', 'min:1', 'max:2'],
            'data_nascimento' => ['required', 'date',],

            'curso' => ['required', 'integer', 'min:1'],
            'turno' => ['required', 'integer', 'min:1'],
            'ano_lectivo' => ['required', 'integer', 'min:1'],
        ]);

        if ($request->bilhete != "") {
            $request->validate([
                'bilhete' => ['required', 'string', 'min:9', 'max:25', 'unique:pessoas,bi'],
            ]);
        }

        $data['pessoa'] = [
            'nome' => $request->nome,
            'bi' => $request->bilhete,
            'telefone' => $request->telefone,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento,
        ];
        $data['estudante'] = [
            'id_pessoa' => null,
            'id_instituicao'=>Auth::user()->id_instituicao,
            'id_curso'=>$request->curso,
            'id_classe'=>1,
            'id_turno'=>$request->turno,
            'id_ano_lectivo'=>$request->ano_lectivo,
        ];

        $pessoa = Pessoa::create($data['pessoa']);
        if($pessoa){
            $data['estudante']['id_pessoa']=$pessoa->id;
            if(Estudante::create($data['estudante'])){
                return back()->with(['success'=>"Feito com sucesso"]);
            }

        }



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
        $estudante = Estudante::find($id);
        if(!$estudante){
            return back()->with(['error'=>"Não encontrou estudante"]);
        }
        $cursos = Curso::where(['estado'=>"on"])->pluck('curso', 'id');
        $turnos = Turno::where(['estado'=>"on"])->pluck('turno', 'id');
        $anos_lectivos = AnoLectivo::where(['estado'=>"on"])->pluck('ano_lectivo', 'id');

        $data = [
            'title' => "Estudantes",
            'menu' => "Estudante",
            'submenu' => "Novo",
            'type' => "estudante",
            'config' => null,
            'getCursos'=>$cursos,
            'getTurnos'=>$turnos,
            'getAnosLectivos'=>$anos_lectivos,
            'getEstudante'=>$estudante,
        ];
        return view('admin.estudante.edit', $data);
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
        $request->validate([
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'genero' => ['required', 'string', 'min:1', 'max:2'],
            'data_nascimento' => ['required', 'date',],

            'curso' => ['required', 'integer', 'min:1'],
            'turno' => ['required', 'integer', 'min:1'],
            'ano_lectivo' => ['required', 'integer', 'min:1'],
        ]);

        if ($request->bilhete != "") {
            $request->validate([
                'bilhete' => ['required', 'string', 'min:9', 'max:25', 'unique:pessoas,bi'],
            ]);
        }

        $data['pessoa'] = [
            'nome' => $request->nome,
            'bi' => $request->bilhete,
            'telefone' => $request->telefone,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento,
        ];
        $data['estudante'] = [
            'id_pessoa' => null,
            'id_instituicao'=>Auth::user()->id_instituicao,
            'id_curso'=>$request->curso,
            'id_classe'=>1,
            'id_turno'=>$request->turno,
            'id_ano_lectivo'=>$request->ano_lectivo,
        ];

        $pessoa = Pessoa::create($data['pessoa']);
        if($pessoa){
            $data['estudante']['id_pessoa']=$pessoa->id;
            if(Estudante::create($data['estudante'])){
                return back()->with(['success'=>"Feito com sucesso"]);
            }

        }
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