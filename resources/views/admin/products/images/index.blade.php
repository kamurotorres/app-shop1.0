<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','Imagenes Producto')

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/bg-2.jpg')}}');">
</div>

		<div class="main main-raised">
			<div class="container">	   	
	        	<div class="section text-center">
	                <h2 class="title">Imagenes del Productos</h2>
					<h4 class="title"> {{$product->id}} - {{$product->name}}</h4>

					<form method="post" action="" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="file" class="btn btn-info btn-sm" name="photo" required>
						<a href="{{url('/admin/products')}}" class="btn btn-danger">Volver</a>

						<button type="submit" class="btn btn-primary">Subir Imagen</button>

					</form>


					<div class="row">
						@foreach($images as $image)
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="panel-body">
									<img src="{{$image->url}}" alt="Sin imagen" width="150px" height="150px">
										<div class="row">
											<form method="post"  action="">
												{{csrf_field()}}
												{{method_field('DELETE')}}
												<input type="hidden" name="image_id" value="{{$image->id}}">
												<button type="submit" class="btn btn-danger  btn-fab-mini btn-round"><i class="material-icons">delete</i></button>
												@if($image->featured)
													<button type="button" class="btn btn-info btn-fab-mini btn-round" rel="tooltip" title="Imagen Destacada">
														<i class="material-icons">favorite_border</i>
													</button>
												@else
													<a href="{{url('/admin/products/'.$product->id.'/images/select/'.$image->id)}}" class="btn btn-primary btn-fab-mini btn-round">
														<i class="material-icons">favorite_border</i>
													</a>
												@endif
											</form>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>


	            </div>
	        </div>

		</div>

@include('includes.footer')
@endsection
