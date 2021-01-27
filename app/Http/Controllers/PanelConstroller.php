<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelConstroller extends Controller
{
    public function mainpage() {
        return view("panel");
    }
}
