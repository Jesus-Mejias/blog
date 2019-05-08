@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col col-md-8 mx-auto">
			<div class="card bg-light mb-3">
				
				<div class="card-header">
					Crear Etiqueta
				</div>

				<div class="card-body">
					{!! Form::open(['route'=>'tags.store']) !!}

						@include('admin.tags.partials.form')
						
					{!! Form::close() !!}
				</div>

			</div>
		</div>
	</div>

@endsection