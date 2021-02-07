<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_history', function (Blueprint $table) {
            $table->smallInteger('id')->autoIncrement();
            // $table->primary('id');
            $table->text('iduser');
            $table->text('typpayment');
            $table->text('howmuch');
            $table->text('formofpayment');
            $table->text('typetransaction');
            $table->text('idserverpayment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_history');
    }
}

/**
 * iduser - id uzytkownika
 * typpayment - typ tranzakcji 1 - jezeli paypal, 2-sms, 3-oplacenie serwera, 4-tranzakcja bitcoin, 5-przelew tradycjyjny
 * howmuch - ile kasy
 * formofpayment -jaka waluta PLN-zł, EUR- Є, usd -$,
 * typetransaction - 1-wplata, 2-oplacenie serwera, 3- wzrot kasy
 * idserverpayment - numer serwera do oplacenia
 */