<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        if (!empty(Auth::user()->email)) {
            return redirect( route('/', app()->getLocale()) );
        }
    }

    public function home()
    {
        $seo = Seo::metaTags('dashboar_home');

        //
        $user = Auth::user();

        return view('dashboard.home', [
            'user' => $user,
            'seo' => $seo,
        ]);
    }
}
