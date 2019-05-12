@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col col-md-8 mx-auto">
			<div class="card bg-light mb-3">
				
				<div class="card-header">
					Ver Entada
				</div>

				<div class="card-body">
					<p><strong>Nombre: </strong>{{ $post->name }}</p>
					<p><strong>Slug: </strong>{{ $post->slug }}</p>
					<p><strong>Contenido: </strong>{{ $post->body }}</p>
				</div>

			</div>
		</div>
	</div>

@endsection