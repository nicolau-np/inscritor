@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <div class="card-category">
                <a href="/admin/escolas/create" class="btn btn-success">Novo</a>
            </div>
        </div>
        <div class="card-body">

            <div class="table">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo de Instituicao</th>
                        <th scope="col">Nível da Instituicao</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Operações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getEscolas as $escolas)

                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$escolas->tipo_instituicao->tipo}}</td>
                    <td>{{$escolas->nivel_instituicao->nivel}}</td>
                        <td>{{$escolas->nome}}</td>
                        <td>{{$escolas->bairro}}</td>
                        <td>{{$escolas->estado}}</td>
                        <td>
                        <a href="/admin/escolas/{{$escolas->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
                        &nbsp;
                        <a href="/admin/escolas/users/{{$escolas->id}}" class="btn btn-warning btn-sm">Admin</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="paginate">
                {{$getEscolas->links()}}
            </div>
            </div>

        </div>
    </div>
</div>
@endsection
