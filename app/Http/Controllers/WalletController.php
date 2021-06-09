<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\wallethistory;
use Mollie\Laravel\Facades\Mollie;
use App\Http\Requests\MoneycheckRequest;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class WalletController extends Controller
{

    
    public function showwallet() {
        return view('wallet');       
    }
    public function showwallethistory() {
        $getwallethistory = wallethistory::where('iduser', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        //= DB::select("SELECT * FROM wallet_history WHERE iduser='$iduser'");
        // return $getwallethistory;
        return view('wallethistory', compact('getwallethistory')); 
    }
    public function showwalletpaypal() {
        if(env("PAYPAL_ACTIVE") == '1')
        {
            return view('walletpaypal');
        }
        else 
        {
            abort(404);
        }
    }

     /**
     * Store a new blog post.
     *
     * @param  \App\Http\Requests\MoneycheckRequest  $request
     * @return Illuminate\Http\Response
     */

    public function addmonybypaypal(MoneycheckRequest $request) {
        $provider = new PayPalClient;
        $provider->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                0 => [
                    "amount"=> [
                        "currency_code"=> "USD",
                        "value" => "100.00",
                    ]
                ]
            ]
          ]);
        // $provider = PayPal::setProvider();
        // dd($provider);
    }
    public function canceledwalletpaypal(Request $request) {

    }
    public function confirmedwalletpaypal(Request $request) {

    }
}