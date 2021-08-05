<?php

namespace App\Http\Controllers\Admin;

use App\Facades\Seo;
use App\Http\Controllers\Controller;
use App\Models\Dictionaries\OrderStatus;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // All reports
    public function index()
    {
        $seo = Seo::metaTags('adm_report_all');

        $orders = Order::query()->OrderByDesc('created_at')->paginate(20);

        return view('admin.report.index', [
            'seo' => $seo,
            'orders' => $orders,
        ]);
    }

    // One report
    public function report()
    {
        $seo = Seo::metaTags('adm_report');

        $orders = Order::query()->OrderByDesc('created_at')->paginate(20);

        return view('admin.report.index', [
            'seo' => $seo,
            'orders' => $orders,
        ]);
    }

    public function report_pdf()
    {
        // send header for PDF

        return response();
    }
}
