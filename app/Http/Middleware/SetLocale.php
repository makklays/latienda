<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


//use Illuminate\Http\Request;


class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //App::setLocale($lang);
        app()->setLocale($request->segment(1));
        return $next($request);
    }
}
