<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'title'=>"Inscritor System",
            'menu'=>"Home",
            'submenu'=>null,
            'type'=>"home",
            'config'=>null,
        ];
        return view('admin.home', $data);
    }

    public function pagina_pricipal(){
        $data = [
            'title'=>"Inscritor System",
            'menu'=>"Principal",
            'submenu'=>null,
            'type'=>"principal",
            'config'=>null,
        ];
        return view('home', $data);
    }
}