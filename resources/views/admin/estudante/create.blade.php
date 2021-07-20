@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <div class="card-category">
                <a href="/admin/estudante/" class="btn btn-success">Listar</a>
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

                {{Form::open(['method'=>"post", 'url' =>"/admin/estudante"])}}
               <div class="row">
                   <div class="col-md-5">
                       <div class="form-group form-group-default">
                       <label>Nome</label>
                       {{Form::text('nome', null, ['class'=>"form-control", 'placeholder'=>"Nome completo"])}}
                       @if($errors->has('nome'))
                        <span class="text-danger">{{$errors->first('nome')}}</span>
                        @endif
                       </div>
                   </div>

                   <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Gênero</label>
                        {{Form::select('genero', [
                            'M'=>"Masculino",
                            'F'=>"Femenino",
                        ], null, ['class'=>"form-control", 'placeholder'=>"Gênero"])}}
                        @if($errors->has('genero'))
                            <span class="text-danger">{{$errors->first('genero')}}</span>
                        @endif
                    </div>
                   </div>

                   <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Data de Nascimento</label>
                        {{Form::date('data_nascimento', null, ['class'=>"form-control", 'placeholder'=>"Data de nascimento"])}}
                        @if($errors->has('data_nascimento'))
                            <span class="text-danger">{{$errors->first('data_nascimento')}}</span>
                        @endif
                    </div>
                   </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Curso</label>
                            {{Form::select('curso', [], null, ['class'=>"form-control", 'placeholder'=>"Curso"])}}
                            @if($errors->has('curso'))
                            <span class="text-danger">{{$errors->first('curso')}}</span>
                            @endif
                        </div>
                       </div>

                       <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Turno</label>
                            {{Form::select('turno', [], null, ['class'=>"form-control", 'placeholder'=>"Turno"])}}
                            @if($errors->has('turno'))
                            <span class="text-danger">{{$errors->first('turno')}}</span>
                            @endif
                        </div>
                       </div>

                       <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Ano Lectivo</label>
                            {{Form::select('ano_lectivo', [], null, ['class'=>"form-control", 'placeholder'=>"Ano Lectivo"])}}
                            @if($errors->has('ano_lectivo'))
                            <span class="text-danger">{{$errors->first('ano_lectivo')}}</span>
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

        </div>
    </div>
</div>
@endsection
