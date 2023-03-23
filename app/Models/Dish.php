<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dish extends Model
{
    protected $fillable = ['nome', 'prezzo', 'ingredienti', 'immagine', 'slug', 'disponibile', 'tipologie', 'restaurant_id'];
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    use HasFactory;

    public static function getIngredients($array)
    {
        return implode(', ', $array);
    }
}
