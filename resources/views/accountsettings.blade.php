@extends('showpanel')
@section('title', __('Wallet'))
@section('body')
<meta name="_token" content="{{csrf_token()}}" />
<script>
jQuery(document).ready(function(){
    jQuery('#changesettings').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    jQuery.ajax({
        url: "{{ route('accountsettingsedit') }}",
        method: 'POST',
        data: {
            accountsettingsmethod: 'information',
            accountsettingsname: jQuery('#accountsettingsname').val(),
            accountsettingssurname: jQuery('#accountsettingssurname').val(),
            accountsettingscountry: jQuery('#accountsettingscountry').val(),
            accountsettingscity: jQuery('#accountsettingscity').val(),
            accountsettingszipcode: jQuery('#accountsettingszipcode').val(),
            accountsettingsstreetandnumberhouse: jQuery('#accountsettingsstreetandnumberhouse').val(),
            accountsettingslanguage: jQuery('#accountsettingslanguage').val()
        },
        error: function(response) {
           jQuery('.alert-danger').show("slow");
            setTimeout(function(){
                jQuery('.alert-danger').hide("slow");
            }, 3000);
        },
        success: function(result){
            jQuery('.alert-success').show("slow");
            jQuery('.alert-success').html(result.success);
            setTimeout(function(){
                jQuery('.alert-success').hide("slow");
            }, 3000);
            setTimeout(function(){
                window.location.reload(1);
            }, 4000);
        }});
    });
});
</script>
<div class="divnacalosc">
    <div id="fullsettings" class="naglowek">Ustawienia Konta</div>
    <div class="calaresztaform">
    <div class="alert alert-success" style="display:none">{{ __("Setting was change") }}</div>
    <div class="alert alert-danger" style="display:none">{{ __("Setting was change") }}</div>
        <form>

            <div>
                <label class="labelcolor">Imie:</Label>
                <input type="text" class="inputcolor" id="accountsettingsname" value="{{ Auth::user()->name }}">
            </div>
            <div>
                <label class="labelcolor">Nazwisko:</Label>
                <input type="text" class="inputcolor" id="accountsettingssurname" value="{{ Auth::user()->surname }}">
            </div>
            <div>
                <label class="labelcolor">kraj:</Label>
                <select  class="inputcolor"  id="accountsettingscountry">
                    @foreach(trans()->get('country') as $key => $value)
                        @if($key == Auth::user()->country)
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <label class="labelcolor">Miasto:</Label>
                <input type="text" class="inputcolor"  id="accountsettingscity" value="{{ Auth::user()->city }}">
            </div>
            <div>
                <label class="labelcolor">Kod pocztowy:</Label>
                <input type="text" class="inputcolor"  id="accountsettingszipcode" value="{{ Auth::user()->zipcode }}">
            </div>
            <div>
                <label class="labelcolor">Ulica i numer domu:</Label>
                <input type="text" class="inputcolor"  id="accountsettingsstreetandnumberhouse" value="{{ Auth::user()->streetandnumberhouse }}">
            </div>
            <div>
                <label class="labelcolor">Język:</Label>
                <select  class="inputcolor"  id="accountsettingslanguage">
                    @foreach (Config::get('app.language') as $lang => $language)
                        @if($lang ==  Auth::user()->language )
                            <option value="{{ $lang }}" selected>{{ $language }}</option>
                        @else
                        <option value="{{ $lang }}">{{ $language }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-center" style="margin-top: 20px; margin-bottom: 5px;">
                <button id="changesettings" class="btn btn-primary">Zapisz</button>
            </div>
        </form>
    </div>
</div>
<div class="divnacalosc" style="padding-top:30px;">
    <div id="fullsettings" class="naglowek">Zmiana hasła</div>
    <div class="calaresztaform">
        <form>
            <div>
                <label class="labelcolor">Aktualne hasło:</Label>
                <input type="password" class="inputcolor" id="accountsettingspasswordnow" required>
            </div>
            <div>
                <label class="labelcolor">Nowe hasło:</Label>
                <input type="password" class="inputcolor" id="accountsettingspasswordnew" required>
            </div>
            <div>
                <label class="labelcolor">Powtórz nowe hasło:</Label>
                <input type="password" class="inputcolor" id="accountsettingspasswordnewrepeat" required>
            </div>
            <div class="d-flex justify-content-center" style="margin-top: 20px; margin-bottom: 5px;">
                <button id="changepassword" class="btn btn-primary">Zapisz</button>
            </div>
        </form>
    </div>
</div>
@endsection