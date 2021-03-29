<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') - Mit2.pl</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/059011e9b1.js" crossorigin="anonymous"></script>
</head>
<body class="body">
@if(isset($languagewaschange))
<script type="text/javascript">
    setTimeout(function(){ 
    $("#showwin").hide("slow", function(){
        var element = document. getElementById('usuncalyerror');
        element. parentNode. removeChild(element);
    });
 }, 3000);</script>
 <div id="showwin">fuhsauifhe</div>
@endif
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
                <a href="{{ route('wallet') }}">
                    <i class="fas fa-wallet"></i>{{__ ('Wallet')}}
                </a>
            </label>
        </span>
    </div>
    <div id="leftmenupanel">
        <span>
            <label>
                <a href="{{ route('accountsettings') }}">
                    <i class="fas fa-cog"></i>{{__ ('Settings')}}
                </a>
            </label>
        </span>
    </div>
    <div id="leftmenupanel">
        <span>
            <label>
                <a href="{{ route('panel') }}">
                    <i class="fas fa-headset"></i>{{__ ('Support')}}
                </a>
            </label>
        </span>
    </div>
    <div id="leftmenupanel">
        <span>
            <label>
                <a href="{{ route('panel') }}">
                    <i class="fas fa-share-alt"></i>{{__ ('Share Account')}}
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
    @role('admin')
    <div id="leftmenupanel">
        <span>
            <label>
                <a href="{{ route('panel') }}">
                    <i class="fas fa-user-shield"></i>{{__ ('Admin Panel')}}
                </a>
            </label>
        </span>
    </div>
    @endrole
</div>
<div id="restofsite">
    <header id="headerpanel">
        <div id="rightheadermenupanel">
            <label>
                20 zł
            </label>
            <label>
                Witaj @empty(Auth::user()->name) {{ Auth::user()->login }} @else {{ Auth::user()->name }} @endempty
            </label>
        </div>
    </header>
</div>
<div id="positionrigtsidepanel">
    <div style="padding-top:30px;">
        @yield('body')
        <footer class="sticky-footer" style="/*position: absolute;*/width: 100%;position: fixed;left: 0;bottom: 0;">
    <div class="text-center">
        <p style="color: rgb(177,182,187);">@2021 by mit2&nbsp;</p>
    </div>
</footer>
    </div>
</div>
</body>
</html>