<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        $seo = Seo::metaTags('home_admin');
        $user = Auth::user();

        return view('admin.home', [
            'user' => $user,
            'seo' => $seo,
        ]);
    }
}
