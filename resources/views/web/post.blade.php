@extends('layouts.app')

@section('content')

<div class="container-fluid">
	
	<div class="col col-md-8 mx-auto">

		<h1>{{ $post->name }}</h1>

		
		<div class="card text-white bg-dark mb-3">
			<div class="card-header">
				Categoria
				<a href="{{ route('category', $post->category->slug)}}">
					{{$post->category->name}}
				</a>
			</div>

			@if($post->file)
				<img src="{{ $post->file }}" alt="" class="car-img-top">
			@endif

			<div class="card-body">
				{{ $post->excerp }}

				<hr>

				{!! $post->body !!}

				<hr>

				Etiquetas

				@foreach($post->tags as $tag)
				<a href="{{ route('tag', $tag->slug)}}">
					{{ $tag->name }}
				</a>
				@endforeach
			</div>
		</div>

	</div>

</div>

@endsection