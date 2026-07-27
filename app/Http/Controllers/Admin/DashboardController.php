<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        if (!auth()->user() || !auth()->user()->is_admin) {
            abort(403, 'Unauthorized access.');
        }
        $totalOrders = Order::count();


        $totalProducts = Product::count();


        $pendingOrders = Order::where('status', 'pending')->count();


        $totalSales = Order::sum('total_price');

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'pendingOrders',
            'totalSales'
        ));
    }
}