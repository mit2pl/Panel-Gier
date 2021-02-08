<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\wallethistory;

class WalletController extends Controller
{
    public function showwallet() {
        // $role =Role::create(['name' => 'usdfsefser']);
        // $permission = Permission::create(['name' => 'add cicedfse']);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // $role = Role::findById(3);
        // $role->givePermissionTo($role);
        //$permission = Permission::findById('3');
        //$permission->assignRole($permission);
        //auth()->user()->assignRole('admin');
        return view('wallet');       
    }
    public function showwallethistory() {
        $getwallethistory = wallethistory::where('iduser', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        //= DB::select("SELECT * FROM wallet_history WHERE iduser='$iduser'");
        // return $getwallethistory;
        return view('wallethistory', compact('getwallethistory')); 
    }
    public function showwalletpaypal() {
        return view('walletpaypal');
    }
}
