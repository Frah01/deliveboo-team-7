<?php

namespace App\Http\Controllers\Admin;

use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recupera l'utente attualmente loggato
        $user = Auth::user();
        $user_id = $user->id;

        if($user_id == 1){
            $restaurants = Restaurant::all();
        }
        else{
            $restaurants = Restaurant::where('user_id', $user_id)->get();
        }

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.restaurants.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $form_data = $request->validated();
        dd($form_data);

        $user = Auth::user();
        $slug = Restaurant::generateSlug($request->nome, '-');

        $form_data['slug'] = $slug;
        $form_data['user_id'] = $user->id;

        if($request->has('immagine')){
            $path = Storage::disk('public')->put('restaurant_images', $request->immagine);
            $form_data['immagine'] = $path;
        } 

        $newRestaurant = Restaurant::create($form_data);
        
        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $user = Auth::user();
        if($user->id == $restaurant->user_id || $user->id == 1)
            return view('admin.restaurants.show', compact('restaurant'));
        else
            return redirect()->route('admin.restaurants.index')->with('warning', 'Non puoi visualizzare i post di un altro utente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::all();
        return view('admin.restaurants.edit', compact('restaurant', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $form_data = $request->validated();
    
       $slug = Restaurant::generateSlug($request->nome, '-');
   
       $form_data['slug'] = $slug;

       if($request->has('immagine')){
       
        if($restaurant->immagine){
            Storage::delete($restaurant->immagine);  
        }
        $path = Storage::disk('public')->put('restaurant_images', $request->immagine);
        
        $form_data['immagine'] = $path;
    }
   
       $restaurant->update($form_data);
       
       return redirect()->route('admin.restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('admin.restaurants.index', compact('restaurant'))->with('message', 'Ristorante eliminato correttamente');
    }
}
