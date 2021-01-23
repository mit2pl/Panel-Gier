<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
                if(Auth::check()) {
                    $userid = Auth::id();
                    $sendupgradelanguage = DB::select('users')->where('id', $userid)->update('language', request('changelanguage'));
                }
                session()->put('language', request('changelanguage'));
                $language = request('changelanguage');
        }
        elseif(Auth::check()) {
            $language = Auth::user()->language;
        }
        elseif(session('language')) {
            $language = session('language');
        }else {
            $language = config('app.locale');
        }
        if(isset($language) && $language !== config('app.locale')) {
            app()->setLocale($language);
        }
        return $next($request);
    }
}
