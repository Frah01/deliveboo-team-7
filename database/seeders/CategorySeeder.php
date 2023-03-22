<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Italiana', 'Cinese', 'Giapponese', 'Vegetariano', 'Vegano', 'Pizzeria', 'Gourmet', 'Fast-Food'];
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->nome = $category;
            $newCategory->slug = Str::slug($newCategory->nome, '-');
            $newCategory->save();
        }
    }
}
