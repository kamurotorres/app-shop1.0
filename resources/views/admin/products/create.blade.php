<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','Crear Producto')

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/bg-2.jpg')}}');">
</div>

		<div class="main main-raised">
			<div class="container">
	        	<div class="section">
					<h2 class="title text-center">Registrar Nuevo producto</h2>
					<!--validaciones para mostrar los errores que envia el modelo-->
					@if($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as  $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form method="post" action="{{url('/admin/products')}}">
						{{csrf_field()}}
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombre</label>
									<input type="text" class="form-control" name="name" value="{{old('name')}}">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Precio</label>
									<input type="number" step="0.01" class="form-control" value="{{old('price')}}" name="price">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Descripcion</label>
									<input type="text" class="form-control" name="description" value="{{old('description')}}">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Categoria</label>
									<select class="form-control" name="category_id">
										@foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<textarea class="form-control" placeholder="Descripcion larga" rows="5"  name="long_description">{{old('long_description')}}</textarea>
						<a href="{{url('/admin/products')}}" class="btn btn-danger">Volver</a>
						<button class="btn btn-success">Registrar</button>
					</form>

	            </div>
	        </div>

		</div>

@include('includes.footer')
@endsection
