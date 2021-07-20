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




<label class="mt-3 mb-3"><b>Form Floating Label</b></label>
<div class="form-group form-floating-label">
	<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
	<label for="inputFloatingLabel" class="placeholder">Input</label>
</div>

<div class="form-group form-floating-label">
	<select class="form-control input-border-bottom" id="selectFloatingLabel" required="">
		<option></option>
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
	</select>
	<label for="selectFloatingLabel" class="placeholder">Select</label>
</div>

<div class="form-group form-floating-label">
	<input id="inputFloatingLabel2" type="text" class="form-control input-solid" required="">
	<label for="inputFloatingLabel2" class="placeholder">Input</label>
</div>

<div class="form-group form-floating-label">
	<select class="form-control input-solid" id="selectFloatingLabel2" required="">
		<option></option>
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
		<option>5</option>
	</select>
	<label for="selectFloatingLabel2" class="placeholder">Select</label>
</div>
            </div>

        </div>
    </div>
</div>
@endsection
