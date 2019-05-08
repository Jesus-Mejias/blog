@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col col-md-8 mx-auto">
			<div class="card bg-light mb-3">
				
				<div class="card-header">
					Ver Etiqueta
				</div>

				<div class="card-body">
					<p><strong>Nombre: </strong>{{ $tag->name }}</p>
					<p><strong>Slug: </strong>{{ $tag->slug }}</p>
				</div>

			</div>
		</div>
	</div>

@endsection