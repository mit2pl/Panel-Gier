@extends('homepage')
@section('body')
<div id="leftnav">
    <div id="logopanel">Logo</div>
    <div id="leftmenupanel">
        <span>
            <label>
                <a href="{{ route('panel') }}">
                    <i class="fa fa-home"></i>{{__ ('Home Page')}}
                </a>
            </label>
        </span>
    </div>
    <div id="leftmenupanel">
        <span>
            <label>
                <a href="{{ route('panel') }}">
                    <i class="fas fa-server"></i>{{__ ('Your Servers')}}
                </a>
            </label>
        </span>
    </div>
    <div id="leftmenupanel">
        <span>
            <label>
                <a href="{{ route('panel') }}">
                    <i class="fas fa-wallet"></i>{{__ ('Wallet')}}
                </a>
            </label>
        </span>
    </div>
    <div id="leftmenupanel">
        <span>
            <label>
                <a href="{{ route('panel') }}">
                    <i class="fas fa-cog"></i>{{__ ('Settings')}}
                </a>
            </label>
        </span>
    </div>
    <div id="leftmenupanel">
        <span>
            <label>
                <form id="logoutform" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-sign-out-alt"></i>{{__ ('Logout')}}
                </a>
            </label>
        </span>
    </div>
    <div id="leftmenupanel">
        <span>
            <label>
                <a href="{{ route('panel') }}">
                    <i class="fas fa-user-shield"></i>{{__ ('Admin Panel')}}
                </a>
            </label>
        </span>
    </div>
</div>
<div id="restofsite">
    <header id="headerpanel"></header>
</div>
@endsection