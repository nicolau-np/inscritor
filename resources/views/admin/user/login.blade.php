@extends('layout.app')
@section('content')

<style>
    .container{
        padding-top: 10%;
        padding-left: 30%;
        padding-right: 30%;
    }

    @media(max-width:700px){
        .container{
        padding-top: 5%;
        padding-left: 1%;
        padding-right: 1%;
    }
    }

.form{
    padding: 4%;
    border: 1px solid #f5f5f5;
}
</style>

<div class="container">

    <div class="form">
        @if (session('error'))
        <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
        @endif

        @if (session('success'))
        <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
        @endif

        {{Form::open(['method'=>"post", 'url'=>"/logar"])}}
        <div class="form-group">
            <input class="form-control" placeholder="{{__('E-mail')}}" name="email" type="email" autofocus="">
            @if($errors->has('email'))
            <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="{{__('Palavra-Passe')}}" name="password" type="password" value="">
            @if($errors->has('password'))
            <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
        </div>
        &nbsp;
        <div class="checkbox">
            <label>
                <input name="remember" type="checkbox" value="Remember Me">&nbsp; {{__('Lembrar Me')}}
            </label>
        </div>
        <button type="submit" class="btn btn-primary">
            {{__('Entrar')}}
        </button>
        {{Form::close()}}
    </div>
</div>
@endsection
