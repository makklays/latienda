<?php

namespace App\Http\Controllers\Web;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function purchase(Request $request)
    {
        //dd( Auth::user()->getAuthIdentifier() );

        if (!empty(Auth::user()->email)) {
            return redirect( route('register', app()->getLocale()) );
        }

        $seo = Seo::metaTags('purchase');

        // send curl to Stripe
        // return from Stripe to some of functions
        // 302 redirect

        /*return view('payments.success', [
            'seo' => $seo,
        ]);*/
    }

    public function purchaseProcess()
    {
        if (!isset(Auth::user()->email) && empty(Auth::user()->email)) {
            return redirect( route('login', app()->getLocale()), 302 );
        }

        // actions
    }

    public function success(Request $request)
    {
        $seo = Seo::metaTags('p-success');

        return view('payments.success', [
            'seo' => $seo,
        ]);
    }

    public function checkout(Request $request)
    {
        $seo = Seo::metaTags('p-checkout');

        return view('payments.checkout', [
            'seo' => $seo,
        ]);
    }

    public function cancel(Request $request)
    {
        $seo = Seo::metaTags('p-cancel');

        return view('payments.cancel', [
            'seo' => $seo,
        ]);
    }
}
