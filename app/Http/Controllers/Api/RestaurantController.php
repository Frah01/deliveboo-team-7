<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index(){
      $restaurants = Restaurant::with('categories')->paginate(6);
      
        return response()->json([
            'success'=>true,
            'results'=>$restaurants
        ]);
    }
   
}
