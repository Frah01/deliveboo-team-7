<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
          'nome'=>['required','unique:restaurants', 'min:3'],
          'prezzo'=>['required', 'min:0','gt:0'],
          'ingredienti'=>['required'],
          'tipologia'=>['required'],
          'immagine'=>['nullable','image']
        ];
    }
    public function messages(){
        return[
            'nome.required'=>'nome del piatto obbligatorio ',
            'nome.min'=>'il nome del piatto deve avere almeno 3 caratteri ',
            'prezzo.required'=>'prezzo obbligatorio', 
            'prezzo.gt'=>'prezzo non può essere negativo o nullo',
            'ingredienti.required'=>'ingredienti obbligatori',
            'tipologia.required'=>'tipologia piatto obbligatoria'
        ];
        
    }
}
