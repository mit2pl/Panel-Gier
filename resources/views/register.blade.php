@extends('homepage')
@section('body')
<div style="height: 800px; position: relative;">
    <form class="loginformsee" method="POST" action="{{ route('register') }}">
    @csrf
        <div class="middlelock"><p class="registerupstermessage">{{ __('registername')}}</p></div>
        <div class="logininput" style="margin-top: 10px;">
            <label class="registertextupsters">{{ __ ('loginname')}}:</label>
            <input id="login" type="text" name="login" value="{{ old('login') }}" class="inputseelogin" placeholder="{{ __ ('loginname')}}" style="/*color: #c5c5c5;*/" required autocomplete="login" autofocus>
        </div>
        <div class="logininput" style="margin-top: 10px;">
            <label class="registertextupsters">{{ __ ('E-Mail Address')}}:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="inputseelogin" placeholder="{{ __ ('E-Mail Address')}}" style="/*color: #c5c5c5;*/" required autocomplete="email" autofocus>
        </div>
        <div class="logininput" style="margin-top: 10px;">
            <label class="registertextupsters">{{ __ ('Password')}}:</label>
            <input  class="inputseelogin" id="password" type="password" name="password" placeholder="{{ __ ('Password')}}" required autocomplete="current-password">
        </div>
        <div class="logininput" style="margin-top: 10px;margin-bottom: 30px;">
            <label class="registertextupsters">{{ __ ('passwordrepeadname')}}:</label>
            <input  class="inputseelogin" id="password-confirm" type="password" name="password_confirmation" placeholder="{{ __ ('passwordrepeadname')}}" required autocomplete="new-password">
        </div>
        <div class="text-center" style="/*margin-top: 41px;*/width: 80%;/*position: relative;*//*display: block;*/margin: 0 auto;/*margin-bottom: 20px;*/">
            <div style="margin-top: 20px;margin-bottom: 20px;"><button class="btn btn-primary btnmytry" type="submit">{{ __ ('Register')}}</button></div>
        </div>
        <div class="text-center" style="margin-bottom: 20px; font-size: 12px; color: #c5c5c5;">{{ __ ('Already have an account')}}   <a class="linka" href="{{ route('login') }}">{{ __ ('Sign in')}}</a></div>
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
@endsection