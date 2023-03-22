<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nome', 'slug', 'immagine'];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    use HasFactory;
}
