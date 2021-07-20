@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <div class="card-category">
                <a href="/admin/ano_lectivo/create" class="btn btn-success">Novo</a>
            </div>
        </div>
        <div class="card-body">

            <div class="table">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ano Lectivo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Operações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getAnos_lectivos as $ano_lectivo)

                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ano_lectivo->ano_lectivo}}</td>
                    <td>{{$ano_lectivo->estado}}</td>

                        <td>
                            <a href="/admin/ano_lectivo/{{$ano_lectivo->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            <div class="paginate">
                {{$getAnos_lectivos->links()}}
            </div>
            </div>

        </div>
    </div>
</div>
@endsection
