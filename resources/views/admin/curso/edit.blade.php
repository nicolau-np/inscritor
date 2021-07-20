@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <div class="card-category">
            <a href="/admin/cursos/" class="btn btn-success">Listar</a>
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

                {{Form::open(['method'=>"put", 'url' =>"/admin/cursos/{$getCurso->id}"])}}
               <div class="row">
                   <div class="col-md-6">
                       <div class="form-group form-group-default">
                       <label>Curso<span class="text-danger">*</span></label>
                       {{Form::text('curso', $getCurso->curso, ['class'=>"form-control", 'placeholder'=>"Curso"])}}
                       @if($errors->has('curso'))
                        <span class="text-danger">{{$errors->first('curso')}}</span>
                        @endif
                       </div>
                   </div>

                   <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Estado <span class="text-danger">*</span></label>
                        {{Form::select('estado', [
                            'on'=>"on",
                            'off'=>"off",
                        ], $getCurso->estado, ['class'=>"form-control", 'placeholder'=>"Estado"])}}
                        @if($errors->has('estado'))
                            <span class="text-danger">{{$errors->first('estado')}}</span>
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
