<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Dish extends Model
{
    
    protected $fillable = ['nome', 'prezzo', 'ingredienti', 'immagine', 'slug', 'disponibile', 'tipologia', 'restaurant_id'];
    use HasFactory;
    
    public static function generateSlug($nome){
        return Str::slug($nome, '-');
    }

    public function restaurants()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
   
    public static function getIngredients($array)
    {
        return implode(', ', $array);
    }
}
