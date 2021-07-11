<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        $data = [
            'title'=>"Iniciar Sessão",
            'menu'=>"Login",
            'submenu'=>null,
            'type'=>"login",
            'config'=>null,
        ];
        return view('admin.user.login', $data);
    }

    public function logar(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'string', 'email', 'max:255'],
                'palavra_passe' => ['required', 'string', 'min:6', 'max:255']
            ]
        );

        /*$credencials = $request->only('email', 'palavra_passe');
        if (Auth::attempt($credencials)) {
            return redirect()->route('admin');
        } else {
            return back()->with(['error' => "E-mail ou Palavra-Passe Incorrectos"]);
        }*/

        dd($request);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}