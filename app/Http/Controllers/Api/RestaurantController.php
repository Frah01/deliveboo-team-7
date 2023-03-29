<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function show($slug){
        $restaurants = Restaurant::all()->where('slug', $slug)->first();
        $dishes = Dish::all()->where('restaurant_id', $restaurants->id);
        // $projects = Project::with('type', 'technologies')->paginate(4);
        if($dishes){
            return response()->json([
                'success' => true,
                'results' => $dishes,
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'error' => 'Nessun piatto trovato'
            ]);
        }
    }
}
