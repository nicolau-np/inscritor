@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <div class="card-category">
            <a href="/admin/escolas/" class="btn btn-success">Listar<h2>{{$getEstudantes->count()}}</h2></a>
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

                {{Form::open(['method'=>"post", 'url' =>"/admin/escolas"])}}
               <div class="row">
                   <div class="col-md-5">
                       <div class="form-group form-group-default">
                       <label>Nome <span class="text-danger">*</span></label>
                       {{Form::text('nome', null, ['class'=>"form-control", 'placeholder'=>"Nome completo"])}}
                       @if($errors->has('nome'))
                        <span class="text-danger">{{$errors->first('nome')}}</span>
                        @endif
                       </div>
                   </div>

                   <div class="col-md-5">
                    <div class="form-group form-group-default">
                        <label>Bilhete</label>
                        {{Form::text('bilhete', null, ['class'=>"form-control", 'placeholder'=>"Nº do Bilhete"])}}
                        @if($errors->has('bilhete'))
                            <span class="text-danger">{{$errors->first('bilhete')}}</span>
                        @endif
                    </div>
                   </div>

                   <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Telefone</label>
                        {{Form::number('telefone', null, ['class'=>"form-control", 'placeholder'=>"Nº de Telefone"])}}
                        @if($errors->has('telefone'))
                            <span class="text-danger">{{$errors->first('telefone')}}</span>
                        @endif
                    </div>
                   </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Tipo de Instituição <span class="text-danger">*</span></label>
                            {{Form::select('tipo', $getTipoInstituicao, null, ['class'=>"form-control", 'placeholder'=>"Tipo de Instiuição"])}}
                            @if($errors->has('tipo'))
                            <span class="text-danger">{{$errors->first('tipo')}}</span>
                            @endif
                        </div>
                       </div>

                       <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Nível de Instituição <span class="text-danger">*</span></label>
                            {{Form::select('nivel', $getNivelInstituicao, null, ['class'=>"form-control", 'placeholder'=>"Nível de Instituição"])}}
                            @if($errors->has('nivel'))
                            <span class="text-danger">{{$errors->first('nivel')}}</span>
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
