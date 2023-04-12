<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Restaurant;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Requests\StoreRestaurantRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'indirizzo' => ['required', 'string', 'max:100'],
            'partita_iva' => ['required', 'string', 'max:100'],
            'telefono' => ['required', 'string', 'max:10'],
            // 'immagine' => ['required', 'string']
        ]);

        
        $user = User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'indirizzo' => $request->indirizzo,
            // 'partita_iva' => $request->partita_iva,
        ]);
        
        event(new Registered($user));

        Auth::login($user);

        $user = Auth::user();
        
        $form_data['nome'] = $request->nome;
        $form_data['email'] = $request->email;
        $form_data['indirizzo'] = $request->indirizzo;
        $form_data['partita_iva'] = $request->partita_iva;
        $form_data['telefono'] = $request->telefono;
        $form_data['user_id'] = $user->id;

        $slug = Restaurant::generateSlug($request->nome, '-');

        $form_data['slug'] = $slug;
        
        if($request->hasFile('immagine')){
            $path = Storage::disk('public')->put('restaurant_images', $request->immagine);
            $form_data['immagine'] = $path;
        } 

        $newRestaurant = Restaurant::create($form_data);

        if($request->has('categories')){
            $newRestaurant->categories()->attach($request->categories);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
