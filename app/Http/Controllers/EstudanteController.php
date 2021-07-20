<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'=>"Estudantes",
            'menu'=>"Estudante",
            'submenu'=>"Listar",
            'type'=>"estudante",
            'config'=>null,
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
        $data = [
            'title'=>"Estudantes",
            'menu'=>"Estudante",
            'submenu'=>"Novo",
            'type'=>"estudante",
            'config'=>null,
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
            'nome'=>['required', 'string', 'min:10', 'max:255'],
            'genero'=>['required', 'string', 'min:1', 'max:2'],
            'data_nascimento' =>['required', 'date',],

            'curso'=>['required', 'integer', 'min:1'],
            'turno'=>['required', 'integer', 'min:1'],
            'ano_lectivo'=>['required', 'integer', 'min:1'],
        ]);

        $data['pessoa'] = [];
        $data['estudante'] = [];
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