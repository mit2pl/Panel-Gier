<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>logowanie</title>
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
@yield('body')
<footer class="sticky-footer" style="/*position: absolute;*/width: 100%;position: fixed;left: 0;bottom: 0;">
    <div class="text-center">
        <p style="color: rgb(177,182,187);">@2021 by mit2&nbsp;</p>
    </div>
</footer>
<div class="changelanguage">
<i id ="languageiconsetting" class="material-icons">language</i>
<p class="showhidelanguage">Język</p>
</div>
</body>
</html>