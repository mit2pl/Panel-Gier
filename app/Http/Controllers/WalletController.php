<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\User;

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
        return view('wallethistory'); 
    }
}
