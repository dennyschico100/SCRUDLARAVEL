@extends('layout.home')
@section('content')
	<div class="row mr-5 " >
		<div class="col-md-6 offset-md-3 " >
			@if($errors->any())
				<div class="alert alert-danger" >
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif

			
		</div>
	</div>
	<style>
		.mt-5{
			border: 1px solid red;
		}
	</style>
	<div class="row  ">
		<div class=" offset-md-3 mt-5 col-md-6">
			<form >
			

			<div class="form-group">
				<label for="">nombre</label>
				<input value="{{$libro->nombre}}"   name="nombre" class="form-control"  type="text">
			</div>

			<div class="form-group">
				<label for="">detalle</label>
				<input value="{{$libro->detalle}}"  name="detalle" class="form-control"  type="text">
			</div>
			<div class="form-group">
				<label for="">autor</label>
				<input value="{{$libro->autor}}" name="autor" class="form-control"  type="text">
			</div>
			<a href="{{action('libroController@index')}}"  value="Volver" class="btn btn-primary" >VOLVER</a>
			</form>
		</div>
		
	</div>
@endsection
