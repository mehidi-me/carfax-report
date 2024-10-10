<?php

namespace App\Http\Controllers;

use App\Models\CreditHistory;
use App\Models\Packages;
use App\Models\TransactionHistory;
use App\Models\UserVins;
use App\Models\VinList;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function checkout(Request $request){
        $user = Auth::user();
        if($user->credit > 0){
            
            $user->credit -= 1;
            $user->save();
            $vin = VinList::where('vin', $request->vin)->first();
           $user_vin = UserVins::create([
                'user_id' => Auth::user()->id,
                'vin_id' => $vin->id
            ]);
            CreditHistory::create([
                'user_id' => Auth::user()->id,
                'status' => 2,
                'credit' => 1,
                'user_vin_id' => $user_vin->id
            ]);
            return redirect()->to('/dashboard')
              ->with('success', 'Transaction successful!');
        }else{
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
            'type' => 'vin'
            ],
            'allow_promotion_codes' => true
        ]);

        return redirect()->away($session->url);
        }
        
    }
    public function checkout2(Request $request){
        
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
            'success_url' => route('success2') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => url('/'),
            'metadata'    => [
            'vin' => $request->vin,  // Set the user ID in metadata
            'type' => 'vin'
            ],
            'allow_promotion_codes' => true
        ]);

        return redirect()->away($session->url);
        
        
    }
    public function checkoutPackage(Request $request){
        $package = Packages::find($request->package_id);
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $package->credit.' Reports',
                        ],
                        'unit_amount'  => $package->price * 100,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => url('/'),
            'metadata'    => [
                'package_id' => $package->id,
                'type' => "package",
            ],
            'allow_promotion_codes' => true
        ]);

        return redirect()->away($session->url);
    }
    public function success(Request $request){
        Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        
        $session = Session::retrieve($session_id);

        $type = $session->metadata->type;
        if($type == 'package'){
            $package = Packages::find($session->metadata->package_id);
  
            $user = Auth::user();
            $user->credit += $package->credit;
            $user->save();
            $transaction = TransactionHistory::create([
              'user_id' => Auth::user()->id,
              'type' => 'package',  
              'amount' => number_format($package->price,2),  
              'method' => 'stripe',  
              'details' => 'Get '.$package->credit.' Credit',  
              'payment_details' => json_encode($session),  
            ]);
            CreditHistory::create([
                'user_id' => Auth::user()->id,
                'status' => 1,
                'credit' => $package->credit,
                'transaction_id' => $transaction->id
            ]);
            return redirect()->to('/credit-history')
            ->with('success', 'Transaction successful!');
        }else{
            $transaction = TransactionHistory::create([
                'user_id' => Auth::user()->id,
                'type' => 'report',  
                'amount' => 7.00,  
                'method' => 'stripe',  
                'details' => 'Get 1 Report',  
                'payment_details' => json_encode($session),  
              ]);
           
        
            $vin = VinList::where('vin', $session->metadata->vin)->first();
            UserVins::create([
                'user_id' => Auth::user()->id,
                'vin_id' => $vin->id
            ]);
              return redirect()->to('/dashboard')
              ->with('success', 'Transaction successful!');
            // $vin = $session->metadata->vin;
            // $data = VinList::where('vin', $vin)->first();
            // return view('download',compact('data'));
        }
      
    }
    public function success2(Request $request){
        Stripe::setApiKey(config('stripe.sk'));

        $session_id = $request->query('session_id');
        
        $session = Session::retrieve($session_id);
           
        
            $data = VinList::where('vin', $session->metadata->vin)->first();
           
            //   return redirect()->to('/dashboard')
            //   ->with('success', 'Transaction successful!');
            // $vin = $session->metadata->vin;
            // $data = VinList::where('vin', $vin)->first();
             return view('download',compact('data'));
        
      
    }
}
