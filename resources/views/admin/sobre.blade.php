@extends('layout.app')
@section('content')
<style>
    .tit{
        font-weight: bold;
    }
</style>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <div class="card-title">{{$submenu}}</div>
            <h4>Sobre o Sistema</h4>
        </div>
        <div class="card-body">

            <span class="tit">Autor:</span> Nicolau Ngala Pungue <br/>
            <span class="tit">E-mail:</span> umn2017139241@student.umn.ed.ao <br/>
            <span class="tit">E-mail:</span> nic340k@gmail.com <br/>
            <span class="tit">Telef.:</span> +244 946 216 795 <br/>
        </div>
    </div>
</div>
@endsection
