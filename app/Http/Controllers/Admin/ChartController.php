<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;


class ChartController extends Controller
{
    public function index()
    {
        $orders = Order::All();
        return view('admin.chart', compact('orders'));
    }
}
