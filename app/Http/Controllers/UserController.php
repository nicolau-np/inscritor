<?php

namespace App\Http\Controllers;

use App\Instituicao;
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
                'password' => ['required', 'string', 'min:6', 'max:255']
            ]
        );

        $credencials = $request->only('email', 'password');
        if (Auth::attempt($credencials)) {
            return redirect()->route('admin');
        } else {
            return back()->with(['error' => "E-mail ou Palavra-Passe Incorrectos"]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function users($id_instituicao){
        $escola = Instituicao::find($id_instituicao);
        if(!$escola){
            return back()->with(['error'=>"Não encontrou"]);
        }

        $data = [
            'title' => "Escolas",
            'menu' => "Escolas",
            'submenu' => "Usuários",
            'type' => "configuracoes",
            'config' => null,
            'getIDEscola'=>$escola->id

        ];
        return view('admin.escola.users', $data);
    }

    public function store(Request $request, $id_instituicao){
        $escola = Instituicao::find($id_instituicao);
        if(!$escola){
            return back()->with(['error'=>"Não encontrou"]);
        }

        $request->validate([
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'genero' => ['required', 'string', 'min:1', 'max:2'],
            'data_nascimento' => ['required', 'date',],

            'email' => ['required', 'email', 'unique:usuarios,email'],
            'nivel' => ['required', 'string', 'min:3'],

        ]);

        if ($request->bilhete != "") {
            $request->validate([
                'bilhete' => ['required', 'string', 'min:9', 'max:25', 'unique:pessoas,bi'],
            ]);
        }

        $data['pessoa'] = [
            'nome' => $request->nome,
            'bi' => $request->bilhete,
            'telefone' => $request->telefone,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento,
        ];

        $data['user']=[
            'id_pessoa',
            'id_instituicao',
            'email',
            'password',
            'nivel_acesso',
            'estado',
        ];
    }
}