<?php


namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.dishes.create');
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
     
      $slug = Dish::generateSlug($request->nome);
    
      $form_data['slug'] = $slug; 
     if($request->hasFile('immagine')){
        $path = Storage::disk('public')->put('dish_image', $request->immagine);
        $form_data['immagine'] = $path; 
      }
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
        return view('admin.dishes.show', compact('dish'));
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
    {
        {
            $form_data = $request->validated();
           
            $slug = Dish::generateSlug($request->nome);
          
            $form_data['slug'] = $slug; 
           if($request->hasFile('immagine')){
            if($dish->immagine){
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
