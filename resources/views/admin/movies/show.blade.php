@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>{{$movie->titolo}}</h1>
        
        <ul>
            @foreach ($movie->getAttributes() as $key => $val)
                <li>
                    {{$key}}: {{$val}}
                </li>
            @endforeach
            @if ($movie->category)
            <li>
                categoria: {{$movie->category->name}}
            </li>
            @endif
        </ul>
    </div>

    @if( count($movie->actors) > 1)
        <div class="cast-container container mb-5">
            <h3>Cast</h3>
            <div class="row">
                @foreach ($movie->actors as $actor)
                    <div class="col-3" style="margin-bottom: 20px;">
                        <div class="card">
                            <img src="{{$actor->foto_url}}" class="card-img-top" alt="..." style="height: 300px;">
                            <div class="card-body">
                                <h5 class="card-title">{{$actor->name . " " . $actor->cognome}}</h5>
                                <p class="card-text">{{$actor->nazionalità}}</p>
                                <a href="#" class="btn btn-primary">dettagli</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> 
    @endif

    <div class="route-link d-flex" style="gap: 20px">
        <a href="{{route('admin.movies.edit', $movie->id)}}" class="btn btn-warning">Modifica</a>
        <form action="{{route('admin.movies.destroy', $movie->id)}}" method="Post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>
</div>
@endsection
