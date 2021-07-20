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

                {{Form::open(['method'=>"put", 'url' =>"/admin/escolas/users/store/{$getIDEscola}"])}}
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group form-group-default">
                        <label>Nome completo <span class="text-danger">*</span></label>
                        {{Form::text('nome', null, ['class'=>"form-control", 'placeholder'=>"Nome completo"])}}
                        @if($errors->has('nome'))
                         <span class="text-danger">{{$errors->first('nome')}}</span>
                         @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                     <div class="form-group form-group-default">
                         <label>Gênero <span class="text-danger">*</span></label>
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
                         <label>Data de Nascimento <span class="text-danger">*</span></label>
                         {{Form::date('data_nascimento', null, ['class'=>"form-control", 'placeholder'=>"Data de nascimento"])}}
                         @if($errors->has('data_nascimento'))
                             <span class="text-danger">{{$errors->first('data_nascimento')}}</span>
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
                   <div class="col-md-5">
                       <div class="form-group form-group-default">
                       <label>Email <span class="text-danger">*</span></label>
                       {{Form::text('email', null, ['class'=>"form-control", 'placeholder'=>"Email"])}}
                       @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                       </div>
                   </div>

                   <div class="col-md-3">
                    <div class="form-group form-group-default">
                        <label>Nível de Acesso <span class="text-danger">*</span></label>
                        {{Form::select('nivel', [
                            'user'=>"user",
                            'admin'=>"admin"
                        ], null, ['class'=>"form-control", 'placeholder'=>"Nível de Acessoí"])}}
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

            <div class="table">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nível de Acesso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getUsers as $users)

                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$users->pessoa->nome}}</td>
                    <td>{{$users->pessoa->genero}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{$users->nivel_acesso}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
