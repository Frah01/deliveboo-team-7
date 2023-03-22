<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = ['nome', 'prezzo', 'ingredienti', 'immagine', 'slug', 'disponibile', 'tipologie', 'restaurant_id'];
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    use HasFactory;
}
