<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function index(){
        // $restaurants = Restaurant::with('categories')->paginate(6);
        if($_GET['nome'] === ''){
            $restaurants = Restaurant::with('categories')->get();
        }
        else{
            $restaurants = Restaurant::with('categories')
                ->where("nome", "like", "%" . $_GET['nome'] . "%")
                ->get();
        }

        return response()->json([
            'success'=>true,
            'results'=>$restaurants
        ]);
    }
   
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
