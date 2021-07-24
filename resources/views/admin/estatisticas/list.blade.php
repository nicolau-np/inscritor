@extends('layout.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <div class="card-category">

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

                {{Form::open(['method'=>"post", 'url' =>"/admin/estatisticas/pegar_lista"])}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-group-default">
                            <label>Curso <span class="text-danger">*</span></label>
                            {{Form::select('curso', $getCursos, null, ['class'=>"form-control", 'placeholder'=>"Curso"])}}
                            @if($errors->has('curso'))
                            <span class="text-danger">{{$errors->first('curso')}}</span>
                            @endif
                        </div>
                       </div>

                       <div class="col-md-2">
                        <div class="form-group form-group-default">
                            <label>Turno <span class="text-danger">*</span></label>
                            {{Form::select('turno', $getTurnos, null, ['class'=>"form-control", 'placeholder'=>"Turno"])}}
                            @if($errors->has('turno'))
                            <span class="text-danger">{{$errors->first('turno')}}</span>
                            @endif
                        </div>
                       </div>

                       <div class="col-md-2">
                        <div class="form-group form-group-default">
                            <label>Ano Lectivo <span class="text-danger">*</span></label>
                            {{Form::select('ano_lectivo', $getAnosLectivos, null, ['class'=>"form-control", 'placeholder'=>"Ano Lectivo"])}}
                            @if($errors->has('ano_lectivo'))
                            <span class="text-danger">{{$errors->first('ano_lectivo')}}</span>
                            @endif
                        </div>
                       </div>

                       <div class="col-md-2">
                        <div class="form-group form-group-default">
                            <label>Estado <span class="text-danger">*</span></label>
                            {{Form::select('estado', [
                                'Todos'=>"Todos",
                                'Qualificados'=>"Qualificados",
                                'Não Qualificados'=>"Não Qualificados",
                            ], null, ['class'=>"form-control", 'placeholder'=>"Estado"])}}
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
