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

                {{Form::open(['method'=>"post", 'url' =>"/admin/profile/update"])}}
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group form-group-default">
                        <label>Palavra-Passe <span class="text-danger">*</span></label>
                        {{Form::text('passe_antiga', null, ['class'=>"form-control", 'placeholder'=>"Palavra-Passe Actual"])}}
                        @if($errors->has('passe_antiga'))
                         <span class="text-danger">{{$errors->first('passe_antiga')}}</span>
                         @endif
                        </div>
                    </div>

                 </div>

                 <div class="row">
                    <div class="col-md-5">
                        <div class="form-group form-group-default">
                        <label>Palavra-Passe Nova <span class="text-danger">*</span></label>
                        {{Form::text('passe_nova', null, ['class'=>"form-control", 'placeholder'=>"Palavra-Passe Nova"])}}
                        @if($errors->has('passe_nova'))
                         <span class="text-danger">{{$errors->first('passe_nova')}}</span>
                         @endif
                        </div>
                    </div>
                 </div>

                 <div class="row">
                    <div class="col-md-5">
                        <div class="form-group form-group-default">
                        <label>Palavra-Passe Confimar <span class="text-danger">*</span></label>
                        {{Form::text('passe_confirm', null, ['class'=>"form-control", 'placeholder'=>"Palavra-Passe Confirmar"])}}
                        @if($errors->has('passe_confirm'))
                         <span class="text-danger">{{$errors->first('passe_confirm')}}</span>
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
