<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsettingsController extends Controller
{
    public function showsettings() {
        return view('accountsettings');
    }
}
