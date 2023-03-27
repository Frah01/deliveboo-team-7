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
            'nome' => ['required','unique:restaurant','min:3'],
            'prezzo' => ['required', 'min:0','gt:0'],
            'ingredienti' => ['required'],
            'tipologia' => ['required', 'min:5'],
            'immagine' => ['nullable', 'image']
        ];
    }
    public function messages()
    {
        return [
            'nome.required' => 'nome del piatto obbligatorio ',
            'nome.min'=>'il nome del piatto deve avere almeno 3 caratteri ',
            'nome.unique'=>'piatto già presente',
            'prezzo.required' => 'prezzo obbligatorio',
            'prezzo.required'=>'prezzo obbligatorio', 
            'prezzo.gt'=>'prezzo non può essere negativo o nullo',
            'ingredienti.required' => 'ingredienti obbligatori',
            'ingredienti.min' => 'ingredienti devono avere almeno 5 caratteri',
            'tipologia.required' => 'tipologia piatto obbligatoria'
        ];
    }
}
