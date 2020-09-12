<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','Listado Categorías')

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/bg-2.jpg')}}');">
</div>

		<div class="main main-raised">
			<div class="container">	   	
	        	<div class="section text-center">
	                <h2 class="title">Listado Categorías</h2>
					@if (session('notification'))
						<div class="alert alert-success">
							{{ session('notification') }}
						</div>
					@endif
					<div class="team">
						<div class="row">
							<a href="{{url('/admin/categories/create')}}" class="btn btn-primary btn-round">Nuevo</a>
							<table class="table">
								<thead>
									<tr>
										<th class="text-center">Id</th>
										<th class="col-md-2 text-left">Nombre</th>
										<th class="col-md-5 text-left">Descripcion</th>
										<th class="text-center">Opciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($categories as $category)
									<tr>
										<td class="text-center">{{$category->id}}</td>
										<td class="text-left">{{$category->name}}</td>
										<td class="text-left">{{$category->descripcion}}</td>
										<td class="td-actions text-center">
                                            <form method="post" action="{{url('/admin/categories/'.$category->id)}}">
												 <a rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
													<i class="material-icons">info</i>
												 </a>

												 <a href="{{url('/admin/categories/'.$category->id.'/edit')}}" type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
													<i class="material-icons">edit</i>
												 </a>
												<a href="{{url('/admin/categories/'.$category->id.'/images')}}" type="button" rel="tooltip" title="Imagenes de la categoria" class="btn btn-warning btn-simple btn-xs">
													<i class="material-icons">image</i>
												</a>
                                                <!-- El metodo_field es los mismo -->
                                                <!-- <input type="hidden" name="_token" value="falta las llaves csrf_token()}}"> -->
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <!-- El metodo_field es los mismo -->
                                                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                                <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                            </form>

										</td>
									</tr>
									@endforeach									
								</tbody>
							</table>             
						</div>
						{{--//todos los objetos completos--}}
						{{$categories->links()}}
					</div>

	            </div>
	        </div>

		</div>

@include('includes.footer')
@endsection
