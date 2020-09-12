<!-- extiende o hereda desde la vista principal -->
@extends('layouts.app')
@section('title','AppShop|Dashboard')
@section('body-class','profile-page')
@section('style')
    <style>
        #carrito{
            margin-bottom: 3%;
        }
    </style>
@section('content')
    <div class="header header-filter" style="background-image: url('{{asset('img/bg-2.jpg')}}');">
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="section">
                <h2 class="title text-center">DashBoard</h2>
                @if (session('notification'))
                    <div class="alert alert-success">
                        {{ session('notification') }}
                    </div>
                @endif
                <ul class="nav nav-pills nav-pills-primary" id="carrito" role="tablist">
                    <li class="active">
                        <a href="#dashboard" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito de compras
                        </a>
                    </li>
                    <li>
                        <a href="#tasks" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizar
                        </a>
                    </li>
                </ul>

                <table class="table">
                    <thead>
                    <tr>
                        <th class="col-md-2 text-center">Producto</th>
                        <th class="col-md-2 text-left">Nombre</th>
                        <th class="col-md-2 text-right">Precio</th>
                        <th class="col-md-2 text-right">Cantidad</th>
                        <th class="col-md-2 text-right">Subtotal</th>
                        <th class="col-md-2 text-center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->cart->details as $detail)
                        <tr>
                            <td class="text-center">
                                <img src="{{$detail->product->featured_image_url}}" alt="Thumbnail Image" height="80px"  class="img-raised img-circle">
                            </td>
                            <td class="text-left">
                                <a href="{{url('/products/'.$detail->product->id)}}" target="_blank"> {{$detail->product->name}} </a>
                            </td>
                            <td class="text-right"> $ {{$detail->product->price}}</td>
                            <td class="text-right"> $ {{$detail->quantity}}</td>
                            <td class="text-right"> $ {{$detail->quantity * $detail->product->price }} </td>
                            <!--*si no llega la categoria poner ese texto por defecto -->
                            <td class="td-actions text-center">
                                <form method="post" action="{{url('/cart')}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <a href="{{url('/products/'.$detail->product->id)}}" target="_blank" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
                                        <i class="material-icons">info</i>
                                    </a>
                                    <!-- El metodo_field es los mismo -->
                                    <!-- <input type="hidden" name="_token" value="falta las llaves csrf_token()}}"> -->

                                    <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
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
                    <tfoot class="text-center">
                    </tfoot>
                </table>
                <p><strong>Total a pagar:</strong>{{auth()->user()->cart->total}}</p>
                <div class="row text-center">
                    <p>Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos</p>
                </div>
                <div class="text-center">
                    <form method="post" action="{{url('/order')}}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary btn-round">
                            <i class="material-icons">done</i>Realizar pedido
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection



