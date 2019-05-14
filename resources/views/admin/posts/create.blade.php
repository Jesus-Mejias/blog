@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col col-md-8 mx-auto">
			<div class="card bg-light mb-3">
				
				<div class="card-header">
					Crear Entrada
				</div>

				<div class="card-body">
					{!! Form::open(['route'=>'posts.store', 'files' => true]) !!}

						@include('admin.posts.partials.form')
						
					{!! Form::close() !!}
				</div>

			</div>
		</div>
	</div>

@endsection