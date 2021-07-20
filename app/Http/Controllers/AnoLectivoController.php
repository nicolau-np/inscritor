<?php

namespace App\Http\Controllers;

use App\AnoLectivo;
use Illuminate\Http\Request;

class AnoLectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anos_lectivos = AnoLectivo::paginate(6);
        $data = [
            'title' => "Ano Lectivo",
            'menu' => "Ano Lectivo",
            'submenu' => "Listar",
            'type' => "configuracoes",
            'config' => null,
            'getAnos_lectivos'=>$anos_lectivos,
        ];
        return view('admin.ano_lectivo.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'title' => "Ano Lectivo",
            'menu' => "Ano Lectivo",
            'submenu' => "Novo",
            'type' => "configuracoes",
            'config' => null,
        ];
        return view('admin.ano_lectivo.create', $data);
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
            'ano_inicio'=>['required', 'integer', 'min:1'],
            'ano_fim'=>['required', 'integer', 'min:1'],
            'estado'=> ['required', 'string', 'min:1', 'max:3'],
        ]);
            $ano_lectivo = $request->ano_inicio .' - '.$request->ano_fim;
        $data = [
            'ano_lectivo'=>$ano_lectivo,
            'estado'=>$request->estado,
        ];

        if(AnoLectivo::create($data)){
            return back()->with(['success'=>"Feito com sucesso"]);
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