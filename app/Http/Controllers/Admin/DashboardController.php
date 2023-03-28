<?php

namespace App\Http\Controllers\Admin;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $user_id = $user->id;
        $restaurant = Restaurant::where('user_id', $user_id)->first();
        $slug = Restaurant::generateSlug($restaurant->nome, '-');
        return view('admin.dashboard', compact('slug'));
    }
}
