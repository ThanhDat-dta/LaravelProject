<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $foodSold = OrderItem::sum('quantity');

        $customerActivity = Order::distinct('user_id')->count('user_id');

        $bestSellingFoods = OrderItem::select('name', DB::raw('SUM(quantity) as orders_count'))
            ->groupBy('name')
            ->orderByDesc('orders_count')
            ->take(5)
            ->get();

        $revenueData = Order::select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(total_price) as total'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $revenue = $revenueData->sum('total');

        return view('admin.dashboard_admin', compact('foodSold', 'customerActivity', 'bestSellingFoods', 'revenue', 'revenueData'));
    }
}