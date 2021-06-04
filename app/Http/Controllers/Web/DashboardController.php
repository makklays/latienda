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
            'seo' => $seo,
            'user' => $user,
        ]);
    }

    public function history()
    {
        $seo = Seo::metaTags('dashboard_history');

        //$orders = Order::query()->where([''])->get();

        //
        $user = Auth::user();

        return view('dashboard.history', [
            'seo' => $seo,
            'user' => $user,
            //'orders' => $orders,
        ]);
    }

    // Pagina - Estados de la órdener
    public function statusesOrders()
    {
        $seo = Seo::metaTags('dashboard_orders');

        //$orders = Order::query()->where([''])->get();
        $orders = '';

        $user = Auth::user();

        return view('dashboard.status', [
            'seo' => $seo,
            'orders' => $orders,
            'user' => $user,
        ]);
    }
}
