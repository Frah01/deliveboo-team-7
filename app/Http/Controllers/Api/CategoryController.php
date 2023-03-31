<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
      
        return response()->json([
            'success'=>true,
            'results'=>$categories
        ]);
    }
   
   
}
