<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(request('changelanguage')) {
            if(file_exist(public_path('resources/lang'. request('changelanguage')))) {
            if(Storage::disk('language')->exists(request("changelanguage"))){
                alert("udalo sie");
            }
                // if(Auth::check()) {
                //     $userid = Auth::id();
                //     $sendupgradelanguage = DB::select('users')->where('id', $userid)->update('language', request('changelanguage'));
                // }
                // session()->put('language', request('changelanguage'));
            }
        }elseif(Auth::check()) {

        }
        elseif(session('language'))
        {
            $language = session('language');
        }
        elseif(config('app.locale')) {
            $language = config('app.locale');
        }
        if(isset($language) && config('app.language' .$language))
        {
            app()->setLocale($language);
        }
        return $next($request);
    }
}
