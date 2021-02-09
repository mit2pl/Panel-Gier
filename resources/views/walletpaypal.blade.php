@extends('showpanel')
@section('title', __('Wallet'))
@section('body')
<div id="paypalwlletmiddle">
    <div id="paypalwallettextup">
        {{ __('Paypal Payment')}}
    </div>
    <div id="paypalwalletrest">
        <table style="margin: 0 auto;">
            <tr style="margin-bottom:10px">
                <td style="padding-right: 10px;text-transform: uppercase; font-weight: 400; font-size: 18px;">{{ __('Type the amount') }}</td>
                <td><input class="inputseelogin" style="color: #c5c5c5;" type="number" name="kwotapaypal" placeholder="Wpisz Liczbę"></td>
            </tr>
            <tr>
                <td style="padding-top: 20px;" colspan="2"><input class="btn btn-primary btnmytry" type="button" value="{{ __('Pay for this')}}"></td>
            </tr>
        </table>
    </div>
</div>
@endsection