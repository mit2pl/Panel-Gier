<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wallethistory extends Model
{
    use HasFactory;

    protected $table='wallet_history';
    protected $fillable = [
        'iduser',
        'typpayment',
        'howmuch',
        'formofpayment',
    ];
    protected $hidden = [
        'updated_at',
    ];
}
