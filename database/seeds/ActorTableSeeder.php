<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Actor;

class ActorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listaAttori = config('actors');

        foreach($listaAttori as $attore){
            $newActor = new Actor();
            $newActor->nome = $attore['nome'];
            $newActor->cognome = $attore['cognome'];
            $newActor->slug = Str::of($newActor->nome . ' ' . $newActor->cognome)->slug("-");
            $newActor->data_nascita = $attore['data_nascita'];
            $newActor->nazionalità = $attore['nazionalità'];
            $newActor->biografia = $attore['biografia'];
            $newActor->foto_url = $attore['foto_url'];

            $newActor->save();
        }
    }
}
