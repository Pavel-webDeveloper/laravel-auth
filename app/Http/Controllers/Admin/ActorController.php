<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Actor;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaAttori = Actor::all();
        return view('admin.actors.index', compact('listaAttori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.actors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // @dd($data);
        $newActor = new Actor();
        $newActor->nome = $data['nome'];
        $newActor->cognome = $data['cognome'];
        $newActor->data_nascita = $data['data_nascita'];
        $newActor->nazionalità = $data['nazionalità'];
        $newActor->biografia = $data['biografia'];
        $newActor->foto_url = $data['foto_url'];

        // GENERARE UNO SLUG UNICO NEL DATABASE
        $baseSlug = Str::of($data['nome']. " " . $data['cognome'])->slug("-");
        $setSlug = $baseSlug;
        $contatore = 1;
        while(Actor::where("slug", $setSlug)->exists()){
            $setSlug = $baseSlug . "-" . $contatore;
            $contatore++;
        }
        $newActor->slug = $setSlug;
        
        $newActor->save();

        return redirect()->route('admin.actors.show', $newActor->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        return view('admin.actors.show', compact('actor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        return view('admin.actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        $data = $request->all();

        // NOME & SLUG
        if($actor->nome != $data['nome'] || $actor->cognome != $data['cognome']){
            $actor->nome = $data['nome'];
            $actor->cognome = $data['cognome'];
            // GENERARE UNO SLUG UNICO NEL DATABASE
            $baseSlug = Str::of($data['nome']. " " . $data['cognome'])->slug("-");
            $setSlug = $baseSlug;
            $contatore = 1;
            while(Actor::where("slug", $setSlug)->exists()){
                $setSlug = $baseSlug . "-" . $contatore;
                $contatore++;
            }
            $actor->slug = $setSlug;
        }

        $actor->data_nascita = $data['data_nascita'];
        $actor->nazionalità = $data['nazionalità'];
        $actor->biografia = $data['biografia'];
        $actor->foto_url = $data['foto_url'];

        $actor->update();
        return redirect()->route('admin.actors.show', $actor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('admin.actors.index')->with("deleteMessage", "L'attore {$actor->nome} {$actor->cognome} è stato eliminato con successo!!!");
    }
}
