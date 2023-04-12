<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $restaurant = Restaurant::where('user_id', $user_id)->first();
        $order = Order::select(DB::raw("SUM(prezzo_totale) as price"), DB::raw("DATE_FORMAT(created_at, '%Y-%M-%D, %H') as date_name"))
            ->where('restaurant_id', $restaurant->id)
            ->groupBy(DB::raw("date_name"), DB::raw("restaurant_id"))
            ->orderBy('date_name', 'ASC')
            ->pluck('price', 'date_name');
        $labels = $order->keys();
        $data = $order->values();
        return view('admin.chart', compact('labels', 'data'));
    }
}
