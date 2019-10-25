@extends('layout.home')
@section('content')
	@if($message=Session::get('success'))
		<div class="alert alert-success">
			
			<p>{{$message}}</p>

		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h1>Laravel crud</h1>
			
		</div>
		<div class="col-md-4">
			<form method="get"  action="{{action('libroController@search')}}"  class="col-xs-12" >
				<div class="col-xs-12 input-group" >
					<input name="txtbuscar"  class="form-control"  type="search">
					<span class="col-xs-12 input-group-btn ">
						<input  class="btn btn-primary" type="submit">
					</span>
				</div>
			</form>
		</div>
		<div  class="col-md-2 text-right " >
			<a class="btn btn-primary" href="{{action('libroController@create')}}"  >Create</a>
		</div>
		<table class="table table-bordered">
			<thead>
				
				<tr>
					<th>No</th>
					<th>nombre</th>
					<th>detalle</th>
					<th>autor</th>
					<th width="270px" >Action</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($libro as $uno)
					<tr>
						<td>{{$uno->id}}</td>
						<td>{{$uno->nombre}}</td>
						<td>{{$uno->detalle}}</td>
						<td>{{$uno->autor}}</td>
						<td>
						<form  method="post" action="{{action('libroController@destroy',$uno->id)}}" >
								@csrf
								@method('Delete')

								<a class="btn btn-info" href="{{action('libroController@show',$uno->id)}}"  >Show</a>
								<a class="btn btn-warning" href="{{action('libroController@edit',$uno->id)}}">Edit</a>
								<input  class="btn btn-danger" value="Delete" type="submit">
								
							</form>
						</td>
					</tr>
				@endforeach


			</tbody>
			
		</table>
	</div>
@endsection