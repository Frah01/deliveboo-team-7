<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['nome', 'slug', 'email', 'telefono', 'indirizzo', 'partita_iva', 'immagine', 'user_id'];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public static function generateSlug($nome){
        return Str::slug($nome, '-');
    }

    use HasFactory;
}
