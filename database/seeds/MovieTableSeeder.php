<?php

use Illuminate\Database\Seeder;
use App\Movie;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listaFilm = config('movies');
        foreach($listaFilm as $film){
            $newMovie = new Movie();
            $newMovie->titolo = $film['titolo'];
            $newMovie->regista = $film['regista'];
            $newMovie->durata = $film['durata'];
            $newMovie->anno = $film['anno'];
            $newMovie->nazione = $film['nazione'];
            $newMovie->pubblicato = $film['pubblicato'];
            $newMovie->save();
        }
        
    }
}
