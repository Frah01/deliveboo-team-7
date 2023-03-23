<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'nome'=>['required'],
            'prezzo'=>['required'],
            'ingredienti'=>['required'],
            'tipologia'=>['required'],
            'immagine'=>['nullable','image']
        ];
    }
    public function message(){
        return[
            'nome.required'=>'nome del piatto obbligatorio ',
            'prezzo.required'=>'prezzo obbligatorio',
            'ingredienti.required'=>'ingredienti obbligatori',
            'tipologia.required'=>'tipologia piatto obbligatoria'
        ];
        
    }
}
