<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        $data = [
            'title'=>"Iniciar Sessão",
            'menu'=>"Login",
            'submenu'=>null,
            'type'=>"login",
            'config'=>null,
        ];
        return view('user.login', $data);
    }
}
