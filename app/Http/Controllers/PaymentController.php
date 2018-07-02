<?php

namespace App\Http\Controllers;
use App\orders;
use Auth;
use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class PaymentController extends Controller
{
    //
    public function charge(Request $request){

    	return view('shipping.payment');
    }

      public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Set your secret key: remember to change this to your live secret key in production
		// See your keys here: https://dashboard.stripe.com/account/apikeys
		\Stripe\Stripe::setApiKey("sk_test_chusCkFQjD0n4dSccVIIytPC");

			// Token is created using Checkout or Elements!
			// Get the payment token ID submitted by the form:
		$token = $request->stripeToken;

		/*$charge = \Stripe\Charge::create([
		    'amount' => Cart::total()*100,
		    'currency' => 'usd',
		    'description' => 'Example charge',
		    'source' => $token,
		    'metadata' => ['order_id' => 6735],
		]);*/
		foreach (Cart::content() as $item) {
		$order = new orders();
		$order->first_name=Auth::user()->first_name;
		$order->last_name=Auth::user()->last_name;
		$order->email=Auth::user()->email;
		$order->phone=Auth::user()->phone_number;
		$order->product_id=$item->id;
		$order->amount=$item->total;
		
		$order->save();
		}

		
		


        return "Charged";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
