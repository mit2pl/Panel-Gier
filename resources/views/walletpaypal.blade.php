@extends('showpanel')
@section('title', __('Wallet'))
@section('body')
<div id="paypalwlletmiddle">
    <div id="paypalwallettextup">
        {{ __('Paypal Payment')}}
    </div>
    <div id="paypalwalletrest">
        <form method="POST" action="{{ route('addmonybypaypal') }}">
        @csrf
            <table style="margin: 0 auto;">
                <tr style="margin-bottom:10px">
                    <td style="padding-right: 10px;text-transform: uppercase; font-weight: 400; font-size: 18px;">{{ __('Type the amount') }}</td>
                    <td><input id="kwotapaypal" class="@error('kwotapaypal') inputerror @enderror inputseelogin" style="color: #c5c5c5;" type="number" name="kwotapaypal" placeholder="Wpisz Liczbę"></td>
                </tr>
                @error('kwotapaypal')
                <tr>
                    <td colspan="2" style="text-align:center">
                        <p class="inputtexterror">
                            {{ __("Plecase enter amount")}}
                        </p>
                    </td>
                </tr>
                @enderror
                <tr>
                    <td style="padding-top: 20px;" colspan="2"><button>afuwehfuaw</button><input class="btn btn-primary btnmytry" type="button" value="{{ __('Pay for this')}}"></td>
                </tr>
            </table>
            <passport-clients></passport-clients>
                            <passport-authorized-clients></passport-authorized-clients>
                            <passport-personal-access-tokens></passport-personal-access-tokens>
        </form>
    </div>
</div>
@endsection