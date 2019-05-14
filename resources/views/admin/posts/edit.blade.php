@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col col-md-8 mx-auto">
			<div class="card bg-light mb-3">
				
				<div class="card-header">
					Editar Entradas
				</div>

				<div class="card-body">
					{!! Form::model($post, 
						['route' => ['posts.update', $post->id],
						'method' => 'PUT', 'files' => true]) !!}

						@include('admin.posts.partials.form')
						
					{!! Form::close() !!}
				</div>

			</div>
		</div>
	</div>

@endsection