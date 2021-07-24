<?php

namespace App\Http\Controllers;

use App\Instituicao;
use App\Pessoa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        $data = [
            'title' => "Iniciar Sessão",
            'menu' => "Login",
            'submenu' => null,
            'type' => "login",
            'config' => null,
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function users($id_instituicao)
    {
        $escola = Instituicao::find($id_instituicao);
        if (!$escola) {
            return back()->with(['error' => "Não encontrou"]);
        }

        $users = User::where(['id_instituicao' => $id_instituicao])->get();

        $data = [
            'title' => "Escolas",
            'menu' => "Escolas",
            'submenu' => "Usuários",
            'type' => "configuracoes",
            'config' => null,
            'getIDEscola' => $escola->id,
            'getUsers' => $users,

        ];
        return view('admin.escola.users', $data);
    }

    public function store(Request $request, $id_instituicao)
    {
        $escola = Instituicao::find($id_instituicao);
        if (!$escola) {
            return back()->with(['error' => "Não encontrou"]);
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

        $palavra_passe = Hash::make("inscritor2021");
        $data['pessoa'] = [
            'nome' => $request->nome,
            'bi' => $request->bilhete,
            'telefone' => $request->telefone,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento,
        ];

        $data['user'] = [
            'id_pessoa' => null,
            'id_instituicao' => $id_instituicao,
            'email' => $request->email,
            'password' => $palavra_passe,
            'nivel_acesso' => $request->nivel,
            'estado' => "on",
        ];

        $pessoa = Pessoa::create($data['pessoa']);
        if ($pessoa) {
            $data['user']['id_pessoa'] = $pessoa->id;
            if (User::create($data['user'])) {
                return back()->with(['success' => "Feito com sucesso"]);
            }
        }
    }

    public function index()
    {
        $id_instituicao = Auth::user()->id_instituicao;
        $instituicao = Instituicao::find($id_instituicao);
        if (!$instituicao) {
            return back()->with(['error' => "Não encontrou"]);
        }
        $usuarios = User::where(['id_instituicao' => $id_instituicao])->paginate(6);
        $data = [
            'title' => "Usuários",
            'menu' => "Usuários",
            'submenu' => "Listar",
            'type' => "usuarios",
            'config' => null,
            'getUsuarios' => $usuarios,
        ];
        return view('admin.user.list', $data);
    }

    public function create()
    {
        $id_instituicao = Auth::user()->id_instituicao;
        $instituicao = Instituicao::find($id_instituicao);
        if (!$instituicao) {
            return back()->with(['error' => "Não encontrou"]);
        }

        $data = [
            'title' => "Usuários",
            'menu' => "Usuários",
            'submenu' => "Novo",
            'type' => "usuarios",
            'config' => null,
        ];
        return view('admin.user.create', $data);
    }

    public function storeE(Request $request)
    {
        $id_instituicao = Auth::user()->id_instituicao;
        $escola = Instituicao::find($id_instituicao);
        if (!$escola) {
            return back()->with(['error' => "Não encontrou"]);
        }

        $request->validate([
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'genero' => ['required', 'string', 'min:1', 'max:2'],
            'data_nascimento' => ['required', 'date',],

            'email' => ['required', 'email', 'unique:usuarios,email'],
        ]);

        if ($request->bilhete != "") {
            $request->validate([
                'bilhete' => ['required', 'string', 'min:9', 'max:25', 'unique:pessoas,bi'],
            ]);
        }

        $palavra_passe = Hash::make("inscritor2021");
        $data['pessoa'] = [
            'nome' => $request->nome,
            'bi' => $request->bilhete,
            'telefone' => $request->telefone,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento,
        ];

        $data['user'] = [
            'id_pessoa' => null,
            'id_instituicao' => $id_instituicao,
            'email' => $request->email,
            'password' => $palavra_passe,
            'nivel_acesso' => "user",
            'estado' => "on",
        ];

        $pessoa = Pessoa::create($data['pessoa']);
        if ($pessoa) {
            $data['user']['id_pessoa'] = $pessoa->id;
            if (User::create($data['user'])) {
                return back()->with(['success' => "Feito com sucesso"]);
            }
        }
    }

    public function profile()
    {
        $id_user = Auth::user()->id;

        $user = User::find($id_user);
        if (!$user) {
            return back()->with(['error' => "Nao encontrou"]);
        }

        $data = [
            'title' => "Usuários",
            'menu' => "Usuários",
            'submenu' => "Perfil",
            'type' => "usuarios",
            'config' => null,
            'getUsuario'=>$user,
        ];
        return view('admin.user.perfil', $data);
    }
}
