<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;

class AnalysisController extends Controller
{
    public function index()
    {

        // ダミー
        $startDate = '2022-08-20';
        $endDate = '2022-08-21';

        $period = Order::betweenDate($startDate, $endDate)
        ->groupBy('id')
        ->selectRaw('id, sum(subtotal) as total,
        customer_name, status, created_at')
        ->orderBy('created_at')
        ->paginate(50);

        return Inertia::render('analysis');
    }
}
