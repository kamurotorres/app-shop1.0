<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','Resultados Busqueda')
@section('body-class','profile-page')
@section('styles')
    <style>
        .team{
            padding-bottom: 50px;
        }
        .team .row .col-md-4{
            margin-bottom: 5em;
        }
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display:         flex;
            flex-wrap: wrap;
        }
        .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }
    </style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url({{asset('img/examples/city.jpg')}});">

</div>
<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{url('/img/Lupa.png')}}" alt="Buscar" class="img-circle img-responsive img-raised">
                    </div>
                    <div class="name">
                        <h3 class="title">Resultado Busqueda</h3>
                    </div>
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif
                </div>

            <div class="description text-center">
                <p>Se encontraron {{$products->count()}} resultados para el termino {{$query}}. </p>
            </div>
        </div>

            <div class="team text-center">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4">
                            <div class="team-player">
                                <img src="{{$product->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle">
                                <h4 class="title">
                                    <a href="{{url('/products/'.$product->id)}}">{{$product->name}}</a> <br />
                                    <small class="text-muted">{{$product->category_name}}</small>
                                </h4>
                                <p class="description">{{$product->long_description}}.</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                 <div class="text-center">
                     {{$products->links()}}
                 </div>
            </div>
    </div>
</div>

@include('includes.footer')
@endsection



