<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','Bienvenido a '.config('app.name'))

@section('body-class','landing-page')
@section('styles')
	<style>
		.team .row .col-md-4{
			margin-bottom: 5em;
		}
		.team .row {
			display: -webkit-box;
			display: -webkit-flex;
			display: -ms-flexbox;
			display:         flex;
			flex-wrap: wrap;
		}
		.team .row > [class*='col-'] {
			display: flex;
			flex-direction: column;
		}

		/*buscador de autocompeltado*/
		.tt-query {
			-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
			-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
		}

		.tt-hint {
			color: #999
		}

		.tt-menu {    /* used to be tt-dropdown-menu in older versions */
			width: 222px;
			margin-top: 4px;
			padding: 4px 0;
			background-color: #fff;
			border: 1px solid #ccc;
			border: 1px solid rgba(0, 0, 0, 0.2);
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			-webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
			-moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
			box-shadow: 0 5px 10px rgba(0,0,0,.2);
		}

		.tt-suggestion {
			padding: 3px 20px;
			line-height: 24px;
		}

		.tt-suggestion.tt-cursor,.tt-suggestion:hover {
			color: #fff;
			background-color: #0097cf;

		}

		.tt-suggestion p {
			margin: 0;
		}

	</style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/bg-2.jpg')}}');">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<h1 class="title">Bienvenido a {{config('app.name')}}.</h1>
	                    <h4>Realiza tu pedido sin salir de casa.</h4>
	                    <br />
	                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
							<i class="fa fa-play"></i> Realizar
						</a>
					</div>
                </div>
            </div>
        </div>

		<div class="main main-raised">
			<div class="container">
		    	<div class="section text-center section-landing">
	                <div class="row">
	                    <div class="col-md-8 col-md-offset-2">
	                        <h2 class="title">¿Por que App Shop?</h2>
	                        <h5 class="description">Puede ver todo el catalogo de productos.</h5>
	                    </div>
	                </div>

					<div class="features">
						<div class="row">
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-primary">
										<i class="material-icons">chat</i>
									</div>
									<h4 class="info-title">Servicio Cliente</h4>
									<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-success">
										<i class="material-icons">verified_user</i>
									</div>
									<h4 class="info-title">Eficiencia</h4>
									<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
								</div>
		                    </div>
		                    <div class="col-md-4">
								<div class="info">
									<div class="icon icon-danger">
										<i class="material-icons">fingerprint</i>
									</div>
									<h4 class="info-title">Seguridad</h4>
									<p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
								</div>
		                    </div>
		                </div>
					</div>
	            </div>

	        	<div class="section text-center">
	                <h2 class="title">Categorias disponibles</h2>
					{{--formulario para autocompletar valores por medo input--}}
					<form class="form-inline" method="get" action="{{url('/search')}}">
						<input type="text" placeholder="Que producto buscas?" class="form-control" id="search" name="query">
						<button type="submit" class="btn btn-primary btn-just-icon">
							<i class="material-icons">search</i>
						</button>
					</form>

					<div class="team">
						<div class="row">
						@foreach($categories as $category)
							<div class="col-md-4">
			                    <div class="team-player">
			                        <img src="{{$category->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
			                        <h4 class="title"> <a href="{{url('/categories/'.$category->id)}}">{{$category->name}}</a>
									</h4>
			                        <p class="description">{{$category->descripcion}}.</p>
			                    </div>
			                </div>
						@endforeach
						</div>
					</div>
					{{$categories->links()}}
				</div>

	        </div>

		</div>

@include('includes.footer')
@endsection
@section('javascript')
	<script type="text/javascript" src="{{asset('/js/typeahead.bundle.min.js')}}"></script>
	<script>
		$(function() {
            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // `states` is an array of state names defined in "The Basics"
                prefetch: '{{url("/products/json")}}'
        		});

            $('#search').typeahead({
                    hint: true,
                    //mostrando con negrita en el proceso
                    highlight: true,
                    minLength: 1
                    //apartir de un caracter
                },{
                    //nombre dataset
                    name: 'products',
                    //fuented e info
                    source: products

                });
        });

	</script>
@endsection