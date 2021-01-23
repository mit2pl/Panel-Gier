@extends('homepage')
@section('body')
<div style="height: 800px; position: relative;">
    <form class="loginformsee" method="POST" action="{{ route('login') }}">
    @csrf
        <div class="middlelock"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" class="bi bi-lock bi bi-key" style="color: rgb(195,195,195);">
                <path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"></path>
            </svg></div>
        <div class="logininput" style="margin-top: 20px;">
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="inputseelogin form-control" placeholder="Email" style="/*color: #c5c5c5;*/" required autocomplete="email" autofocus>
        </div>
        <div class="logininput" style="margin-top: 10px;margin-bottom: 20px;">
            <input class="inputseelogin form-control" id="password" type="password" name="password" style="margin-top: 20px;margin-bottom: 20px;" placeholder="Password" required autocomplete="current-password">
        </div>
        <div class="logininput" style="margin-top: 10px;margin-bottom: 20px;">
            <div class="text-center" style="/*margin-top: 10px;*//*display: block;*//*margin-bottom: -10px;*/"><label style="margin-top: 10px;color: #c5c5c5;"><input name="remember" id="remember" type="checkbox">&nbsp;Zapamiętaj hasło {{ __('Remember Me') }}</label></div>
        </div>
        <div class="text-center" style="/*margin-top: 41px;*/width: 80%;/*position: relative;*//*display: block;*/margin: 0 auto;/*margin-bottom: 20px;*/">
            <div style="margin-top: 20px;margin-bottom: 20px;"><button class="btn btn-primary btnmytry" type="submit">Zaloguj</button></div>
        </div>
        <div class="text-center"><a class="linka" href="{{ route('password.request') }}"><br>Nie pamiętasz hasła ?<br><br></a></div>
        <div class="text-center" style="/*margin-top: 10px;*//*display: block;*//*margin-bottom: -10px;*/"><a class="linka" href="#">Rejestracja<br><br></a></div>
    </form>
    @if ($errors->any())
<div id="usuncalyerror">
   <script type="text/javascript">
    setTimeout(function(){ 
    $("#showerror").hide("slow", function(){
        var element = document. getElementById('usuncalyerror');
        element. parentNode. removeChild(element);
    });
 }, 3000);</script>
 @foreach ($errors->all() as $error)
<div id="showerror">{{ $error }}</div>
@endforeach
</div>
@endif
</div>
<footer class="sticky-footer" style="/*position: absolute;*/width: 100%;position: fixed;left: 0;bottom: 0;">
    <div class="text-center">
        <p style="color: rgb(177,182,187);">@2021 by mit2&nbsp;</p>
    </div>
</footer>
@endsection