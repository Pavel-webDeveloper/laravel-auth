<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMovie = Movie::all();
        return view('admin.movies.index', compact('listaMovie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movies.create');
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
        // @dump($data);

        $newMovie = new Movie();
        $newMovie->titolo = $data['titolo'];
        $newMovie->regista = $data['regista'];

        $newMovie->durata = sprintf('%02d:%02d:%02d', $data['ore'], $data['minuti'], $data['secondi']);

        $newMovie->anno = $data['anno'];
        $newMovie->nazione = $data['nazione'];

        if( isset($data['pubblicato']) && $data['pubblicato'] == 'on'){
            $newMovie->pubblicato = 1;
        }else {
            $newMovie->pubblicato = 0;
        }

        // GENERARE UNO SLUG UNICO NEL DATABASE
        $baseSlug = Str::of($data['titolo'])->slug("-");
        $setSlug = $baseSlug;
        $contatore = 1;
        while(Movie::where("slug", $setSlug)->exists()){
            $setSlug = $baseSlug . "-" . $contatore;
            $contatore++;
        }
        $newMovie->slug = $setSlug;
        
        $newMovie->save();

        return redirect()->route('admin.movies.show', $newMovie->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        [$ore, $minuti, $secondi] = explode(':', $movie->durata);

        return view('admin.movies.edit', compact('movie', 'ore', 'minuti', 'secondi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
