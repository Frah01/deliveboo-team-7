<?php


namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Models\Restaurant;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
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

        if ($user_id == 1) {
            $dishes = Dish::all();
        } else {
            $restaurant = Restaurant::where('user_id', $user_id)->first();
            $restaurant_id = $restaurant->id;
            $dishes = Dish::where('restaurant_id', $restaurant_id)->get();
            // dd($restaurant);
        }

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $form_data = $request->validated();

        //recupera l'utente attualmente loggato
        $user = Auth::user();

        $restaurant = Restaurant::where('user_id', $user->id)->first();
        $restaurant_id = $restaurant->id;

        $slug = Dish::generateSlug($request->nome);

        $form_data['slug'] = $slug;
        $form_data['restaurant_id'] = $restaurant_id;

        if ($request->hasFile('immagine')) {
            $path = Storage::disk('public')->put('dish_image', $request->immagine);
            $form_data['immagine'] = $path;
        };

        $newDish = Dish::create($form_data);

        return redirect()->route('admin.dishes.index')->with('message', 'Piatto creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $restaurant = Restaurant::where('user_id', $user_id)->first();
        $slug = Restaurant::generateSlug($restaurant->nome, '-');

        if ($user->id == 1) {
            return view('admin.dishes.show', compact('dish', 'slug'));
        } else {
            $restaurant = Restaurant::where('user_id', $user_id)->first();
            if ($restaurant->id == $dish->restaurant_id)
                return view('admin.dishes.show', compact('dish', 'slug'));
            else
                return redirect()->route('admin.dishes.index')->with('warning', 'Non puoi visualizzare i post di un altro utente');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    { {
            $form_data = $request->validated();
            $slug = Dish::generateSlug($request->nome);

            $form_data['slug'] = $slug;
            if ($request->hasFile('immagine')) {
                if ($dish->immagine) {
                    Storage::delete($dish->immagine);
                }
                $path = Storage::disk('public')->put('dish_image', $request->immagine);

                $form_data['immagine'] = $path;
            }


            $dish->update($form_data);
            
            return redirect()->route('admin.dishes.index')->with('message', 'Piatto modificato correttamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin.dishes.index', compact('dish'))->with('message', 'Piatto eliminato correttamente');
    }
}
