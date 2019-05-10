@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col col-md-8 mx-auto">
			<div class="card bg-light mb-3">
				
				<div class="card-header">
					Ver Categoria
				</div>

				<div class="card-body">
					<p><strong>Nombre: </strong>{{ $category->name }}</p>
					<p><strong>Slug: </strong>{{ $category->slug }}</p>
					<p><strong>Contenido: </strong>{{ $category->body }}</p>
				</div>

			</div>
		</div>
	</div>

@endsection