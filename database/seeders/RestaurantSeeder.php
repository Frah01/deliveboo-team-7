<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = config('ristoranti');
        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->email = $restaurant['email'];
            $newRestaurant->telefono = $restaurant['telefono'];
            $newRestaurant->nome = $restaurant['nome'];
            $newRestaurant->indirizzo = $restaurant['indirizzo'];
            $newRestaurant->partita_iva = $restaurant['partita_iva'];
            $newRestaurant->immagine = $restaurant['immagine'];
            $newRestaurant->save();
        }
    }
}
