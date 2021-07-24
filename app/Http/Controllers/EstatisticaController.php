<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstatisticaController extends Controller
{
    public function index(){
        $data = [
            'title' => "Estatísticas",
            'menu' => "Listas",
            'submenu' => "Listar",
            'type' => "estatisticas",
            'config' => null,
        ];
        return view('admin.estatisticas.list', $data);
    }
}