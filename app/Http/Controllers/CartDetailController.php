<?php

namespace App\Http\Controllers;

use App\CartDetail;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    //creamos funcion para recibir los valores del formi
    //cuando se ingresan la cantidades
    public function store(Request $request){
        $cartDetail = new CartDetail(); //creamos un nuevo objeto
        $cartDetail->cart_id = auth()->user()->cart->id; //capturamos el usuario de ese carro
        $cartDetail->product_id= $request->product_id;
        $cartDetail->quantity = $request->quantity;
        $cartDetail->save();
        $notification = "El producto fue añadido correctamente";
        return back()-> with(compact('notification'));
    }

    public function destroy (Request $request){
        $cartDetail = CartDetail::find($request->cart_detail_id); //creamos un nuevo objeto
        //se agrrega esta validacion para que otro usuario
        //no borres los detalles de otros carritos
        if($cartDetail->cart_id == auth()->user()->cart->id)
        $cartDetail->delete();
        $notification = "El producto fue eliminado correctamente";
        return back()-> with(compact('notification'));
    }
}
