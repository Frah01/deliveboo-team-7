<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = config('piatti');
        foreach ($dishes as $dish) {
            $newDish = new Dish();
            $newDish->nome = $dish['nome'];
            $newDish->prezzo = $dish['prezzo'];
            $newDish->ingredienti = $dish['ingredienti'];
            $newDish->immagine = $dish['immagine'];
            $newDish->disponibile = $dish['disponibile'];
            $newDish->tipologie = $dish['tipologie'];
            $newDish->slug = Str::slug($newDish->nome, '-');
            $newDish->save();
        }
    }
}
