<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','Editar producto')

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/bg-2.jpg')}}');">
</div>

		<div class="main main-raised">
			<div class="container">
	        	<div class="section">
					<h2 class="title text-center">Editar producto</h2>
					@if($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as  $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form method="post" action="{{url('/admin/products/'.$product->id.'/edit')}}">
						{{csrf_field()}}
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombre</label>
									<input type="text" class="form-control" name="name" value="{{ old('name',$product->name)}}">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Precio</label>
									<input type="number" step="0.01" class="form-control" name="price" value="{{old('price',$product->price)}}" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Descripcion</label>
									<input type="text" class="form-control" name="description" value="{{old('description',$product->description)}}">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Categoria</label>
									<select class="form-control" name="category_id">
										@foreach($categories as $category)
											<option value="{{$category->id}}"
												@if($category->id == old('category_id',$product->category_id))
												selected @endif> {{$category->name}}
											</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group label-floating">
									<label class="control-label">Descripcion Larga</label>
									<textarea class="form-control"  rows="5" name="long_description">{{old('long_description',$product->long_description)}}</textarea>

								</div>
							</div>
						</div>

						<a href="{{url('/admin/products')}}" class="btn btn-danger">Volver</a>
						<button class="btn btn-success">Actualizar</button>
					</form>

	            </div>
	        </div>

		</div>

@include('includes.footer')
@endsection
