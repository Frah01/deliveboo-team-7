<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['slug', 'nome', 'cognome', 'data', 'prezzo_totale', 'indirizzo', 'telefono', 'email', 'note', 'stato_ordine', 'restaurant_id'];
    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
    use HasFactory;
}
