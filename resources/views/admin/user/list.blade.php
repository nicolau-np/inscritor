@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <div class="card-category">
                <a href="/admin/usuarios/create" class="btn btn-success">Novo</a>
            </div>
        </div>
        <div class="card-body">

            <div class="table">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nível de Acesso</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($getUsuarios as $users)

                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$users->pessoa->nome}}</td>
                    <td>{{$users->pessoa->genero}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->nivel_acesso}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="paginate">
                {{$getUsuarios->links()}}
            </div>
            </div>

        </div>
    </div>
</div>
@endsection
