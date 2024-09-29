<?php

namespace App\Http\Controllers;

use App\Models\VinList;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function checkout(Request $request){
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => '1 Car Fax Search',
                        ],
                        'unit_amount'  => 700,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => url('/'),
            'metadata'    => [
            'vin' => $request->vin,  // Set the user ID in metadata
            ],
        ]);

        return redirect()->away($session->url);
    }
    public function success(Request $request){
        Stripe::setApiKey(config('stripe.sk'));

        // Retrieve the session_id from the query parameters
        $session_id = $request->query('session_id');
        
        // Fetch the session from Stripe using the session ID
        $session = Session::retrieve($session_id);
   // return $session;
        // Get the user ID from the session metadata
        $vin = $session->metadata->vin;
        $data = VinList::where('vin', $vin)->first();
        return view('download',compact('data'));
    }
}
