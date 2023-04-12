<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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
            'nome' => ['required', 'unique:restaurants', 'min:3','max:100'],
            'telefono' => ['required','size:10'],
            'immagine' => ['nullable' , 'image'],
            'email' => ['required','email:@', 'max:50'],
            'indirizzo' => ['required', 'max:100'],
            'partita_iva' => ['required', 'size:11'],
            'categories'=>['required', 'exists:categories,id'],
            'password'=>['required', 'min:8','confirmed'],
        ];
    }

    public function messages(){
        return[
            'nome.required' => 'Inserisci un nome al ristorante!',
            'nome.unique' => 'Un ristorante con lo stesso nome è già presente nella pagina!',
            'nome.max' => 'Il nome può avere massimo 100 caratteri!',
            'nome.min' => 'Il nome deve essere almeno di 3 caratteri ',
            'email.required'=>'Inserisci una email!',
            'email.email'=>'Email non valida!',
            'password.required'=>'Inserisci una password',
            'password.min'=>'la password deve avere almeno 8 caratteri',
            'password.confirmed'=>'password non coincidono',
            'immagine.image' => 'Inserire un formato di file valido!',
            'telefono.required'=>'Inserisci un numero di telefono!',
            'telefono.size' => 'Il numero deve avere 10 caratteri!',
            'email.max' => 'La mail può essere di massimo 50 caratteri!',
            'indirizzo.required' => 'Inserisci un indirizzo al ristorante!',
            'indirizzo.max' => 'L\'indirizzo può avere massimo 100 caratteri!',
            'partita_iva.required' => 'Inserisci una partita iva al ristorante!',
            'partita_iva.size' => 'La partita_iva deve avere 11 caratteri!',
            'categories.required' => 'Seleziona almeno una categoria!',
        ];
    }
}
