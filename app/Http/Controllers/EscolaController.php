<?php

namespace App\Http\Controllers;

use App\Instituicao;
use App\NivelInstituicao;
use App\TipoInstituicao;
use Illuminate\Http\Request;

class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escolas = Instituicao::where('nome', '!=', 'Master')->paginate(6);
        $data = [
            'title' => "Escolas",
            'menu' => "Escolas",
            'submenu' => "Listar",
            'type' => "configuracoes",
            'config' => null,
            'getEscolas' => $escolas,
        ];
        return view('admin.escola.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_instituicaos = TipoInstituicao::where('tipo', '!=', 'Master')->pluck('tipo', 'id');
        $nivel_instituicaos = NivelInstituicao::where('nivel', '!=', 'master')->pluck('nivel', 'id');
        $data = [
            'title' => "Escolas",
            'menu' => "Escolas",
            'submenu' => "Novo",
            'type' => "configuracoes",
            'config' => null,
            'getTipoInstituicao' => $tipo_instituicaos,
            'getNivelInstituicao' => $nivel_instituicaos,
        ];
        return view('admin.escola.create', $data);
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
            'nome'=>['required', 'string', 'min:10', 'max:255'],
            'bairro'=> ['required', 'string', 'min:10', 'max:255'],
            'estado' => ['required', 'string', 'min:1', 'max:3'],
            'tipo'=> ['required', 'integer', 'min:1'],
            'nivel' => ['required', 'integer', 'min:1'],
        ]);

        $data = [
            'id_tipo_instituicao'=>$request->tipo,
            'id_nivel_instituicao'=>$request->nivel,
            'nome'=>$request->nome,
            'bairro'=> $request->bairro,
            'estado'=> $request->estado,
        ];

        if(Instituicao::create($data)){
            return back()->with(['success' => "Feito com sucesso"]);
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