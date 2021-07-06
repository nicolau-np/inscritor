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
            'type'=>"none",
        ];
        return view('admin.home', $data);
    }
}