@extends('layout.app')
@section('content')
<div class="container">
    
    <div class="form">
        {{Form::open(['method'=>"post", 'url'=>""])}}

        {{Form::close()}}
    </div>
</div>
@endsection
