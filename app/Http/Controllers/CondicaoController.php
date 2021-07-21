<?php

namespace App\Http\Controllers;

use App\AnoLectivo;
use App\Condicao;
use App\Instituicao;
use Illuminate\Http\Request;

class CondicaoController extends Controller
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
    public function create($id_instituicao)
    {
        $instituicao = Instituicao::find($id_instituicao);
        if (!$instituicao) {
            return back()->with(['error' => "Novo encontrou"]);
        }
        $condicao = Condicao::where(['id_instituicao' => $id_instituicao])->get();
        $anos_lectivos = AnoLectivo::pluck('ano_lectivo', 'id');
        $data = [
            'title' => "Condições",
            'menu' => "Escolas",
            'submenu' => "Novo",
            'type' => "configuracoes",
            'config' => null,
            'getCondicao' => $condicao,
            'getIDEscola' => $id_instituicao,
            'getAnosLectivos' => $anos_lectivos,
        ];
        return view('admin.escola.condicao', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id_instituicao)
    {
        $instituicao = Instituicao::find($id_instituicao);
        if (!$instituicao) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $request->validate([
            'ano_lectivo' => ['required', 'integer', 'min:1'],
            'ano_inicio' => ['required', 'integer', 'min:1'],
            'ano_fim' => ['required', 'integer', 'min:1'],
        ]);

        $data = [
            'id_instituicao'=>$id_instituicao,
            'id_ano_lectivo'=>$request->ano_lectivo,
            'ano_inicio'=>$request->ano_inicio,
            'ano_fim'=>$request->ano_fim,
            'estado'=>"on",
        ];

        if(Condicao::create($data)){
            return back()->with(['success' => "Feito com sucesso"]);
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