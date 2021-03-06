@extends('layouts.app')

@section('content')

<div class="container-fluid">
	
	<div class="col col-md-8 mx-auto">

		<h1>Lista de Articulos</h1>

		@foreach($posts as $post)
			<div class="card text-white bg-dark mb-3">
				<div class="card-header">
					<h3>{{ $post->name }}</h3>
				</div>
				@if($post->file)
					<img src="{{ $post->file }}" alt="" class="car-img-top">
				@endif
				<div class="card-body">
					{{ $post->excerp }}
					<a href="{{ route('post', $post->slug)}}" class="pull-right">
						Leer más...
					</a>
				</div>
			</div>
		@endforeach

		{{ $posts->render() }}
	</div>

</div>

@endsection