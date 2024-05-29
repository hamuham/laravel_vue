<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function index()
    {

        // ダミー
        $startDate = '2022-08-20';
        $endDate = '2022-08-21';

        // $period = Order::betweenDate($startDate, $endDate)
        // ->groupBy('id')
        // ->selectRaw('id, sum(subtotal) as total,
        // customer_name, status, created_at')
        // ->orderBy('created_at')
        // ->paginate(50);

        $subQuery = Order::betweenDate($startDate, $endDate)
        ->where('status', true)
        ->groupBy('id')
        ->selectRaw('id, sum(subtotal) as totalPerPurchase,
        DATE_FORMAT(created_at, "%Y%m%d") as date');

        $data = DB::table($subQuery)
        ->groupBy('date')
        ->selectRaw('date, sum(totalPerPurchase) as total' )
        ->get();

        return Inertia::render('analysis');
    }
}
