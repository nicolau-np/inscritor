@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <div class="card-category">
            <a href="/admin/escolas/" class="btn btn-success">Listar</a>
            </div>
        </div>
        <div class="card-body">

            <div class="form">

                @if (session('error'))
                    <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif

                @if (session('success'))
                    <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif

                {{Form::open(['method'=>"put", 'url' =>"/admin/escolas/condicoes/store/{$getIDEscola}"])}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Ano Lectivo <span class="text-danger">*</span></label>
                            {{Form::select('ano_lectivo', $getAnosLectivos, null, ['class'=>"form-control", 'placeholder'=>"Ano Lectivo"])}}
                            @if($errors->has('ano_lectivo'))
                            <span class="text-danger">{{$errors->first('ano_lectivo')}}</span>
                            @endif
                        </div>
                       </div>

                    <div class="col-md-3">
                     <div class="form-group form-group-default">
                         <label>Ano Inicio <span class="text-danger">*</span></label>
                         {{Form::number('ano_inicio', null, ['class'=>"form-control", 'placeholder'=>"Ano Inicio"])}}
                         @if($errors->has('ano_inicio'))
                             <span class="text-danger">{{$errors->first('ano_inicio')}}</span>
                         @endif
                     </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group form-group-default">
                            <label>Ano Fim <span class="text-danger">*</span></label>
                            {{Form::number('ano_fim', null, ['class'=>"form-control", 'placeholder'=>"Ano Fim"])}}
                            @if($errors->has('ano_fim'))
                                <span class="text-danger">{{$errors->first('ano_fim')}}</span>
                            @endif
                        </div>
                       </div>
                 </div>


                <div class="row">
                    <div class="col-md-12">
                        {{Form::submit('Salvar', ['class'=>"btn btn-primary"])}}
                    </div>
                </div>

                {{Form::close()}}
            </div>

            <div class="table">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ano Lectivo</th>
                        <th scope="col">Ano Início</th>
                        <th scope="col">Ano Fim</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Operações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getCondicao as $condicao)

                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$condicao->ano_lectivo->ano_lectivo}}</td>
                    <td>{{$condicao->ano_inicio}}</td>
                    <td>{{$condicao->ano_fim}}</td>
                    <td>{{$condicao->estado}}</td>
                    <td>

                    </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
