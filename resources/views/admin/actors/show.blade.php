@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 style="padding: 35px;">{{$actor->nome . " " . $actor->cognome}}</h1>

        <div class="image-container mb-5" 
        style="width: 554px; height: 554px; overflow-y:hidden; box-shadow: 4px 5px 25px 6px black; border-radius: 145px;" >
            <img style="width: 100%;"
            src="{{$actor->foto_url}}" alt="{{$actor->nome . " " . $actor->cognome}}">
        </div>
        
        <ul>
            {{-- @foreach ($actor->getAttributes() as $val)
                <li>
                    {{$key}}: {{$val}}
                </li>
            @endforeach --}}

            {{-- info statiche --}}
            <li>data di nascita: {{$actor->data_nascita}}</li>
            <li>Nazionalità: {{$actor->nazionalità}}</li>
            <li><p>Biografia:{{$actor->biografia}}</p></li>
        </ul>
    </div>

    @if( count($actor->movies) > 0)
        <div class="cast-container container mb-5">
            <h3>Film interpretati</h3>
            <ul>
                @foreach ($actor->movies as $movie)
                    <li>{{$movie->titolo}}</li>
                @endforeach
            </ul>
        </div> 
    @endif

    <div class="route-link d-flex" style="gap: 20px">
        <a href="{{route('admin.actors.edit', $actor->id)}}" class="btn btn-warning">Modifica</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eliminaMovie">
            Elimina
        </button>
        {{-- <form action="{{route('admin.movies.destroy', $movie->id)}}" method="Post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form> --}}
    </div>

    

    {{-- Modale Conferma Eliminazione --}}
    <div class="modal fade" id="eliminaMovie" tabindex="-1" aria-labelledby="eliminaMovieLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminaMovieLabel">{{$actor->nome}}  {{$actor->cognome}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Sicuro di voler eliminare questo attore dalla lista?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                    <form action="{{route('admin.actors.destroy', $actor->id)}}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
