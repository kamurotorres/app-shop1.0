<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','Editar Categoria')

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/bg-2.jpg')}}');">
</div>

		<div class="main main-raised">
			<div class="container">
	        	<div class="section">
					<h2 class="title text-center">Editar Categoria</h2>
					@if($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as  $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
						@else
						@if (session('notification'))
							<div class="alert alert-success">
								{{ session('notification') }}
							</div>
						@endif
					@endif
					<form method="post" action="{{url('/admin/categories/'.$category->id.'/edit')}}">
						{{csrf_field()}}
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group label-floating">
									<label class="control-label">Nombre</label>
									<input type="text" class="form-control" name="name" value="{{ old('name',$category->name)}}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group label-floating">
									<label class="control-label">Descripcion</label>
									<textarea class="form-control"  rows="5" name="descripcion">{{old('descripcion',$category->descripcion)}}</textarea>

								</div>
							</div>
						</div>

						<a href="{{url('/admin/categories')}}" class="btn btn-danger">Volver</a>
						<button class="btn btn-success">Actualizar</button>
					</form>

	            </div>
	        </div>

		</div>

@include('includes.footer')
@endsection
