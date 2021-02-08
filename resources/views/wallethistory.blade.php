@extends('showpanel')
@section('title', __('Wallet'))
@section('body')
<div style="margin-top:10px; width: 90%; margin:0 auto;">
    {{-- <table id="tableforeach"> --}}
    <table class="table table-striped table-dark">
        <tr>
            <th id=borderright>{{ __ ('Typ Transaction')}}</th>
            <th>{{ __('Amount')}}</th>
            <th>{{ __('Transaction Date')}}</th>
        </tr>
        @forelse ($getwallethistory as $getwallethistorya)
            <tr>
                <td>
                    @if($getwallethistorya->typpayment == '1')
                    {{ __('Paypal Transaction')}}
                    @elseif($getwallethistorya->typpayment == '2')
                    {{ __('Sms Transaction')}}
                    @elseif($getwallethistorya->typpayment == '3')
                    {{ __('Server Payment Transaction')}} {{ $getwallethistorya->idserverpayment }}
                    @elseif($getwallethistorya->typpayment == '4')
                    {{ __('bitcoin Transaction')}}
                    @elseif($getwallethistorya->typpayment == '5')
                    {{ __('Traditional Transaction')}}
                    @endif
                </td>
                <td @if($getwallethistorya->typetransaction == '1' or $getwallethistorya->typetransaction == '3') style="color:#0cff0c; font-weight: 600;" @elseif($getwallethistorya->typetransaction == '2') style="color:#ff1313; font-weight: 600;" @endif>
                    {{ $getwallethistorya->howmuch }} 
                    @foreach(config('app.moneyselect') as $klucz => $moneyselect)
                        @if($getwallethistorya->formofpayment == $klucz)
                            {{ $moneyselect }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $getwallethistorya->created_at }}</td>
            </tr>
        @empty
        <tr>
            <td colspan="3" style="text-align:center;">{{ __('No history wallet') }}</td>
        </tr>
        @endforelse
    </table>
    <div>{{ $getwallethistory->links()}}</div>
</div>
@endsection