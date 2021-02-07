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
                <td>{{ $getwallethistorya->howmuch }}</td>
                <td>{{ $getwallethistorya->howmuch }}</td>
                <td>{{ $getwallethistorya->created_at }}</td>
            </tr>
        @empty
        <tr>
            <td colspan="3">Brak histori</td>
        </tr>
        @endforelse
    </table>
    <div>{{ $getwallethistory->links()}}</div>
</div>
@endsection