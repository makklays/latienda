<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Dictionaries\OrderStatus;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // All reports
    public function index()
    {
        $seo = Seo::metaTags('adm_customer_all');

        $customers = User::query()->OrderByDesc('created_at')->paginate(20);
        $count_customers = User::count();

        return view('admin.customer.index', [
            'seo' => $seo,
            'customers' => $customers,
            'count_customers' => $count_customers,
        ]);
    }

    // One report
    public function show(Request $request, $locale, $id)
    {
        $seo = Seo::metaTags('adm_customer');

        $customer = User::query()->where(['id' => $id])->firstOrFail();
        $count_customers = User::count();

        return view('admin.customer.show', [
            'seo' => $seo,
            'customer' => $customer,
            'count_customers' => $count_customers,
        ]);
    }

}
