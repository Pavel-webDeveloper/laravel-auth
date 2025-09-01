<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Movie;

class SlugMovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listaFilm = Movie::all();

        foreach ($listaFilm as $film) {
           $film->slug = Str::of($film->titolo)->slug("-");
           $film->save();
        } 
    }
}
