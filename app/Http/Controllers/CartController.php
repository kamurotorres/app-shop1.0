<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    //para acutlizar el estado del carrito
    public function update(){
        $client = auth()->user();
        $cart = $client->cart;
        $cart->status = 'Pending';
        //para captuar fechas carbon
        $cart->order_date = Carbon::now();
        $cart->save();

        //envias los datos a la vista de correo
        $admins = User::where('admin',true)->get();
        Mail::to($admins)->send(new NewOrder($client,$cart));

        $notification = 'Tu pedido se ha registro correctamente.Te contactaremos pronto via email';


        return back()->with(compact('notification'));
    }
}
