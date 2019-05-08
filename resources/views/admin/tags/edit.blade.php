@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col col-md-8 mx-auto">
			<div class="card bg-light mb-3">
				
				<div class="card-header">
					Editar Etiqueta
				</div>

				<div class="card-body">
					{!! Form::model($tag, 
						['route' => ['tags.update', $tag->id],
						'method' => 'PUT']) !!}

						@include('admin.tags.partials.form')
						
					{!! Form::close() !!}
				</div>

			</div>
		</div>
	</div>

@endsection