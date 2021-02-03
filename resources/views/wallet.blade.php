@extends('showpanel')
@section('title', __('Wallet'))
@section('body')
<div class="container">
  <div class="row">
    <div class="col-md-6 colposition">
        <a href="#" class="stretched-link alinkhover">
            <label style="display:block;">
            <i class="fab fa-paypal" id="walleticon"></i>
            <div id="possitionwallettext">
                <div class="inscription">
                    {{ __('Paypal Payment')}}
                </div>
            </div>
            </label>
        </a>
    </div>
    <div class="col-md-6 colposition">
        <a href="#" class="stretched-link alinkhover">
            <label style="display:block;">
            <i class="fab fa-bitcoin" id="walleticon"></i>
            <div id="possitionwallettext">
                <div class="inscription">
                    {{ __('Bitcoin Payment')}}
                </div>
            </div>
            </label>
        </a>
    </div>
    <div class="col-md-6 colposition">
        <a href="#" class="stretched-link alinkhover">
            <label style="display:block;">
            <i class="fas fa-university" id="walleticon"></i>
            <div id="possitionwallettext">
                <div class="inscription">
                    {{ __('Traditional transfer')}}
                </div>
            </div>
            </label>
        </a>
    </div>
    <div class="col-md-6 colposition">
        <a href="#" class="stretched-link alinkhover">
            <label style="display:block;">
            <i class="fas fa-sms" id="walleticon"></i>
            <div id="possitionwallettext">
                <div class="inscription">
                    {{ __ ('Service Unavailable')}}
                </div>
            </div>
            </label>
        </a>
    </div>
    <div class="col-md-6 colposition">
        <a href="#" class="stretched-link alinkhover">
            <label style="display:block;">
            <i class="fas fa-history" id="walleticon"></i>
            <div id="possitionwallettext">
                <div class="inscription">
                    {{ __ ('Payment history')}}
                </div>
            </div>
            </label>
        </a>
    </div>
  </div>
</div>
@endsection