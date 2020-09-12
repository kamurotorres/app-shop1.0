<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','Listado Productos')

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/bg-2.jpg')}}');">
</div>

		<div class="main main-raised">
			<div class="container">	   	
	        	<div class="section text-center">
	                <h2 class="title">Listado Productos</h2>

					<div class="team">
						<div class="row">
							<a href="{{url('/admin/products/create')}}" class="btn btn-primary btn-round">Nuevo</a>
							<table class="table">
								<thead>
									<tr>
										<th class="text-center">Id</th>
										<th class="col-md-2 text-left">Nombre</th>
										<th class="col-md-5 text-left">Descripcion</th>
										<th class="text-left">Categoría</th>
										<th class="text-right">Precio</th>
										<th class="text-center">Opciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach($products as $product)
									<tr>
										<td class="text-center">{{$product->id}}</td>
										<td class="text-left">{{$product->name}}</td>
										<td class="text-left">{{$product->description}}</td>
										<!--*si no llega la categoria poner ese texto por defecto -->
										<td class="text-left">{{$product->category ? $product->category->name :'General'}}</td>
										<td class="text-right"> $ {{$product->price}}</td>
										<td class="td-actions text-center">
                                            <form method="post" action="{{url('/admin/product/'.$product->id)}}">
												 <a href="{{url('/products/'.$product->id)}}" target="_blank" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
													<i class="material-icons">info</i>
												 </a>

												 <a href="{{url('/admin/products/'.$product->id.'/edit')}}" type="button" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
													<i class="material-icons">edit</i>
												 </a>
												<a href="{{url('/admin/products/'.$product->id.'/images')}}" type="button" rel="tooltip" title="Imagenes del prodcuto" class="btn btn-warning btn-simple btn-xs">
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
						{{$products->links()}}
					</div>

	            </div>
	        </div>

		</div>

@include('includes.footer')
@endsection
