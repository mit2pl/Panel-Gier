@extends('showpanel')
@section('title', __('Wallet'))
@section('body')
<div style="margin-top:10px; width: 80%; margin:0 auto;">
    {{-- <table id="tableforeach"> --}}
    <table class="table table-striped table-dark">
        <tr>
            <th id=borderright>Typ Tranzakcji</th>
            <th>Kwota</th>
            <th>Data</th>
        </tr>
        @forelse ($getwallethistory as $getwallethistory)
            <tr>
                <td>{{ $getwallethistory->howmuch }}</td>
                <td></td>
                <td></td>
            </tr>
        @empty
        <tr>
            <td colspan="3">Brak histori</td>
        </tr>
        @endforelse
    </table>
    <div class="d-flex justify-content-center">{!! $getwallethistory->onEachSide(5)->links() !!}</div>
</div>
@endsection