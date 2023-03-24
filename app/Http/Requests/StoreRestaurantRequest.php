<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'unique:restaurants', 'max:100'],
            'slug' => ['required'],
            'telefono' => ['nullable', 'max:13'],
            'immagine' => ['nullable' , 'image'],
            'email' => ['nullable', 'max:50'],
            'indirizzo' => ['required', 'max:100'],
            'partita_iva' => ['required', 'max:11'],
            'categories'=>['exists:categories,id'],
        ];
    }

    public function messages(){
        return[
            'nome.required' => 'Inserisci un nome al ristorante!',
            'nome.unique' => 'Un ristorante con lo stesso nome è già presente nella pagina!',
            'nome.max' => 'Il nome può avere massimo 100 caratteri!',
            'slug.required' => 'Inserisci uno slug per il progetto!',
            'immagine.image' => 'Inserire un formato di file valido!',
            'telefono.max' => 'Il numero può essere di massimo 13 caratteri!',
            'email.max' => 'La mail può essere di massimo 50 caratteri!',
            'indirizzo.required' => 'Inserisci un indirizzo al ristorante!',
            'indirizzo.max' => 'L\'indirizzo può avere massimo 100 caratteri!',
            'partita_iva.required' => 'Inserisci una partita_iva al ristorante!',
            'partita_iva.max' => 'La partita_iva può avere massimo 11 caratteri!',
            
            
            
        ];
    }
}
