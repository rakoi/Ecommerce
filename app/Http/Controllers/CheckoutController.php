<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Auth;
class CheckoutController extends Controller
{
    public function step1(){
    	if(Auth::check()){
    		return redirect('shipping');
    	}
    	return redirect('login');
    }
    public function Shipping(){
    	if (Cart::total()==0) {
    		return redirect('/');
    	}
    	return view('shipping.index');
    }
}
