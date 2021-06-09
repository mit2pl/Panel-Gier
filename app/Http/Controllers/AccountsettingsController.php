<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountsettingsController extends Controller
{
    public function showsettings() {
        return view('accountsettings');
    }
    public function accountsettingsedit(Request $pobierz) {
        if(Auth::id()) {
            if($pobierz->accountsettingsmethod == 'information')
            {
            // $update = Auth::where('id', Auth::id())->update(['name' => $pobierz('name')]);
            $getwallethistory = User::where('id', Auth::id())->update(['name' => $pobierz->accountsettingsname, 'surname' => $pobierz->accountsettingssurname, 'country' => $pobierz->accountsettingscountry, 'city' => $pobierz->accountsettingscity, 'zipcode' => $pobierz->accountsettingszipcode, 'streetandnumberhouse' => $pobierz->accountsettingsstreetandnumberhouse, 'language' => $pobierz->accountsettingslanguage]);
            // echo "zmienio";
            return response()->json(['udalosie'=>'yes']);
            // return redirect()->route('accountsettings');
            }else if($pobierz->accountsettingsmethod == "getpassword") {
                
            }else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }
}
