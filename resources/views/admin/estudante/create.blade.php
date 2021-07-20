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
               <div class="row">
                   <div class="col-md-5">
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
               </div>

            </div>

        </div>
    </div>
</div>
@endsection
