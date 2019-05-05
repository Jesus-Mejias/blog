@extends('layouts.app')

@section('content')

<div class="container-fluid">
	
	<div class="col col-md-8 mx-auto">

		<h1>Lista de Articulos</h1>

		@foreach($posts as $post)
			<div class="card text-white bg-dark mb-3">
				<div class="card-header">
					<h2>{{ $post->name }}</h2>
				</div>
				@if($post->file)
					<img src="{{ $post->file }}" alt="" class="car-img-top">
				@endif
				<div class="card-body">
					{{ $post->excerp }}
					<a href="#" class="pull-right">Leer más...</a>
				</div>
			</div>
		@endforeach

		{{ $posts->render() }}
	</div>

</div>

@endsection