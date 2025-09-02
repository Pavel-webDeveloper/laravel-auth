<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listaCategorie = ["Azione", "Drammatico", "Triller", "Horror", "Commedia", "Avventura", "Romantico", "Fantascienza", "Fantasy", "Animazione"];

        foreach ($listaCategorie as $cat) {
           $newCategory = new Category();
           $newCategory->name = $cat;
           $newCategory->slug = Str::of($newCategory->name)->slug("-");
           
           $newCategory->save();
        }
    }
}
