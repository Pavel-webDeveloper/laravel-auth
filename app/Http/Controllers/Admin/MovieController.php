<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Movie;
use App\Category;

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
        $listaCategorie = Category::all();
        return view('admin.movies.create', compact('listaCategorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'ore' => (int) $request->input('ore'),
            'minuti' => (int) $request->input('minuti'),
            'secondi' => (int) $request->input('secondi'),
        ]);
        $request->validate($this->regoleValidazione());

        $data = $request->all();
        // dd($data);

        $newMovie = new Movie();
        $newMovie->titolo = $data['titolo'];
        $newMovie->regista = $data['regista'];

        $newMovie->durata = sprintf('%02d:%02d:%02d', $data['ore'], $data['minuti'], $data['secondi']);

        $newMovie->anno = $data['anno'];
        $newMovie->nazione = $data['nazione'];
        $newMovie->category_id = $data['category_id'];

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
        $listaCategorie = Category::all();

        return view('admin.movies.edit', compact('movie', 'ore', 'minuti', 'secondi', 'listaCategorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $request->merge([
            'ore' => (int) $request->input('ore'),
            'minuti' => (int) $request->input('minuti'),
            'secondi' => (int) $request->input('secondi'),
        ]);
        $request->validate($this->regoleValidazione());

        $data = $request->all();
        // dd($data);

        // TITOLO & SLUG
        if($movie->titolo != $data['titolo']){
            $movie->titolo = $data['titolo'];
            // GENERARE UNO SLUG UNICO NEL DATABASE
            $baseSlug = Str::of($movie->titolo)->slug("-");
            $setSlug = $baseSlug;
            $contatore = 1;
            while(Movie::where("slug", $setSlug)->exists()){
                $setSlug = $baseSlug . "-" . $contatore;
                $contatore++;
            }
            $movie->slug = $setSlug;
        }

        // 
        $movie->regista = $data['regista'];

        $movie->durata = sprintf('%02d:%02d:%02d', $data['ore'], $data['minuti'], $data['secondi']);

        $movie->anno = $data['anno'];
        $movie->nazione = $data['nazione'];
        $movie->category_id = $data['category_id'];

        if( isset($data['pubblicato']) && $data['pubblicato'] == 'on'){
            $movie->pubblicato = 1;
        }else {
            $movie->pubblicato = 0;
        }

        $movie->update();
        return redirect()->route('admin.movies.show', $movie->id);
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

    protected function regoleValidazione()
    {
        return [
            'titolo' => 'required|string|max:255',
            'regista' => 'required|string|max:255',
            'ore' => 'required|integer|min:0',
            'minuti' => 'required|integer|min:0|max:59',
            'secondi' => 'required|integer|min:0|max:59',
            'anno' => 'required|integer|min:1888|max:' . date('Y'),
            'nazione' => 'required|string|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'pubblicato' => 'nullable|in:on',
            'image' => 'nullable|string|max:255',
        ];
    }

}
