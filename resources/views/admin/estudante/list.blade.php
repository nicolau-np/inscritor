@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <div class="card-category">
                <a href="/admin/estudante/create" class="btn btn-success">Novo</a>
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
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Turno</th>
                        <th scope="col">Operações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getEstudantes as $estudante)

                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$estudante->pessoa->nome}}</td>
                    <td>{{$estudante->genero}}</td>
                        <td>{{$estudante->data_nascimento}}</td>
                        <td>{{$estudante->curso->curso}}</td>
                        <td>{{$estudante->turno->turno}}</td>
                        <td>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="paginate">
                {{$getEstudantes->links()}}
            </div>
            </div>

        </div>
    </div>
</div>
@endsection
