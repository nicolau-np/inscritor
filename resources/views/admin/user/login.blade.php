@extends('layout.app')
@section('content')
<div class="container">

    <div class="form">
        {{Form::open(['method'=>"post", 'url'=>""])}}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{Form::email('email', null, ['placeholder'=>"Email", 'class'=>"form-controll"])}}

                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{Form::label('password')}}
                    {{Form::password('password', null, ['placeholder'=>"Palavra-Passe", 'class'=>"form-controll"])}}

                </div>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>
@endsection
