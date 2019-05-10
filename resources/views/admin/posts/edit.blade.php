@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="col col-md-8 mx-auto">
			<div class="card bg-light mb-3">
				
				<div class="card-header">
					Editar Categoria
				</div>

				<div class="card-body">
					{!! Form::model($category, 
						['route' => ['categories.update', $category->id],
						'method' => 'PUT']) !!}

						@include('admin.categories.partials.form')
						
					{!! Form::close() !!}
				</div>

			</div>
		</div>
	</div>

@endsection