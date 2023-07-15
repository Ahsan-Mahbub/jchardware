<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller
{
    public function cart()
    {
        return view('frontend.file.cart');
    }
    public function checkout()
    {
        return view('frontend.file.checkout');        
    }

    public function guestCheckout()
    {
        return view('frontend.file.guest-checkout');
    }

    public function addCart(Request $request)
    {
        $data['id']=$request->product_id;
        $data['name']=$request->product_name;
        $data['qty']=$request->quentity;
        $data['price']=$request->product_price;  
        $data['weight']=0;   
        $data['options']['product_img']=$request->product_img;
        $data['options']['category_name']=$request->category_name;
        $data['options']['total_price']=$request->product_price * $request->quentity;;

        $success =   Cart::add($data);
        return redirect()->route('cart')->with('message','Product Cart Added Successfully');
    }

    public function cartDelete($id){
        Cart::remove($id);
        return redirect()->back()->with('message','Cart Product Remove Successfully');
    }
}