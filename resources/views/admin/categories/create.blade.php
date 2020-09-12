<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','Crear Categoria')

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/bg-2.jpg')}}');">
</div>

		<div class="main main-raised">
			<div class="container">
	        	<div class="section">
					<h2 class="title text-center">Registrar Nueva Categoria</h2>
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

					<form method="post" action="{{url('/admin/categories')}}">
						{{csrf_field()}}
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group label-floating">
									<label class="control-label">Nombre</label>
									<input type="text" class="form-control" name="name" value="{{old('name')}}">
								</div>
							</div>
						</div>
						<textarea class="form-control" placeholder="Descripcion" rows="5"  name="descripcion">{{old('descripcion')}}</textarea>
						<a href="{{url('/admin/categories')}}" class="btn btn-danger">Volver</a>
						<button class="btn btn-success">Registrar</button>
					</form>

	            </div>
	        </div>

		</div>

@include('includes.footer')
@endsection
