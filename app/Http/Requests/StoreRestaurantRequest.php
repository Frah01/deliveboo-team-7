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
            'slug' => ['required'],
            'telefono' => ['nullable','min:10', 'max:13'],
            'immagine' => ['nullable' , 'image'],
            'email' => ['required','email:@', 'max:50'],
            'indirizzo' => ['required', 'max:100'],
            'partita_iva' => ['required', 'size:11'],
            'categories'=>['exists:categories,id'],
            'password'=>['required', 'min:8','confirmed'],
        ];
    }

    public function messages(){
        return[
            'nome.required' => 'Inserisci un nome al ristorante!',
            'nome.unique' => 'Un ristorante con lo stesso nome è già presente nella pagina!',
            'nome.max' => 'Il nome può avere massimo 100 caratteri!',
            'nome.min' => 'Il nome deve essere almeno di 3 caratteri ',
            'email.required'=>'mail obbligatoria',
            'email.email'=>'mail non valida',
            'password.required'=>'inserisci una password',
            'password.min'=>'la password deve avere almeno 8 caratteri',
            'password.confirmed'=>'password non coincidono',
            'slug.required' => 'Inserisci uno slug per il progetto!',
            'immagine.image' => 'Inserire un formato di file valido!',
            'telefono.max' => 'Il numero può essere di massimo 13 caratteri!',
            'email.max' => 'La mail può essere di massimo 50 caratteri!',
            'indirizzo.required' => 'Inserisci un indirizzo al ristorante!',
            'indirizzo.max' => 'L\'indirizzo può avere massimo 100 caratteri!',
            'partita_iva.required' => 'Inserisci una partita iva al ristorante!',
            'partita_iva.size' => 'La partita_iva deve avere 11 caratteri!',
            
            
            
        ];
    }
}
