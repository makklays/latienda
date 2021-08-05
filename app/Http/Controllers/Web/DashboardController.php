<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
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
        $seo = Seo::metaTags('dashboard_home');

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

        $orders = Order::query()->where(['user_id' => Auth::user()->id, 'd_order_status_id' => 6])->get();

        //
        $user = Auth::user();

        return view('dashboard.history', [
            'seo' => $seo,
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    // Pagina - Estados de la órdener
    public function statusesOrders()
    {
        $seo = Seo::metaTags('dashboard_orders');

        $orders = Order::query()
            ->where(['user_id' => Auth::user()->id])
            ->whereIn('d_order_status_id', [1, 2, 3, 4, 5])
            ->get();

        $user = Auth::user();

        return view('dashboard.status', [
            'seo' => $seo,
            'orders' => $orders,
            'user' => $user,
        ]);
    }

    public function profile()
    {
        $seo = Seo::metaTags('dashboard_profile');

        //$user = User::query()->where(['id' => Auth::user()->id])->first();

        //
        $user = Auth::user();

        return view('dashboard.profile', [
            'seo' => $seo,
            'user' => $user,
        ]);
    }

    public function profile_process(Request $request)
    {
        $user = User::query()->where(['id' => Auth::user()->id])->first();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();

        return redirect( route('da_home', app()->getLocale()) )
            ->with('flash_message', trans('main.Your_profile_was_updated_suceessfully'))
            ->with('flash_type', 'success');
    }
}
