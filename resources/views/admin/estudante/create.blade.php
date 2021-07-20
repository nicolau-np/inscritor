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
                
                {{Form::open(['method'=>"post", 'url' =>"/admin/estudante/store"])}}
               <div class="row">
                   <div class="col-md-6">
                       <div class="form-group form-group-default">
                       <label>Nome</label>
                       {{Form::text('nome', null, ['class'=>"form-control", 'placeholder'=>"Nome completo"])}}
                       </div>
                   </div>

                   <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Gênero</label>
                        {{Form::select('genero', [
                            'M'=>"Masculino",
                            'F'=>"Femenino",
                        ], ['class'=>"form-control", 'placeholder'=>"Gênero"])}}

                    </div>
                   </div>

                   <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Data de Nascimento</label>
                        {{Form::date('data_nascimento', null, ['class'=>"form-control", 'placeholder'=>"Data de nascimento"])}}

                    </div>
                   </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Curso</label>
                            {{Form::select('curso', [], ['class'=>"form-control", 'placeholder'=>"Curso"])}}

                        </div>
                       </div>

                       <div class="col-md-3">
                        <div class="form-group form-group-default">
                            <label>Turno</label>
                            {{Form::select('turno', [], ['class'=>"form-control", 'placeholder'=>"Turno"])}}

                        </div>
                       </div>

                       <div class="col-md-3">
                        <div class="form-group form-group-default">
                            <label>Ano Lectivo</label>
                            {{Form::select('ano_lectivo', [], ['class'=>"form-control", 'placeholder'=>"Ano Lectivo"])}}

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
