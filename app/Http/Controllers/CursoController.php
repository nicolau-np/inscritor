<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::paginate(6);
        $data = [
            'title' => "Cursos",
            'menu' => "Cursos",
            'submenu' => "Listar",
            'type' => "configuracoes",
            'config' => null,
            'getCursos' => $cursos,
        ];
        return view('admin.curso.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Cursos",
            'menu' => "Cursos",
            'submenu' => "Novo",
            'type' => "configuracoes",
            'config' => null,
        ];
        return view('admin.curso.create', $data);
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
            'curso' => ['required', 'string', 'min:10', 'max:255'],
            'estado' => ['required', 'string', 'min:1', 'max:3'],
        ]);

        $data = [
            'curso' => $request->curso,
            'estado' => $request->estado,
        ];

        if(Curso::create($data)){
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