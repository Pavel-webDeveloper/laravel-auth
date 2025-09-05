@extends('layouts.app')
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $errore)
                <li>{{ $errore }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('admin.actors.update', $actor->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">nome</label>
                <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" aria-describedby="nome" name="nome" value="{{$actor->nome}}">
            </div>
            @error('nome')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror

            <div class="mb-3">
                <label for="cognome" class="form-label">cognome</label>
                <input type="text" class="form-control @error('cognome') is-invalid @enderror" id="cognome" aria-describedby="cognome" name="cognome" value="{{$actor->cognome}}">
            </div>
            @error('cognome')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror

            <div class="mb-3">
                <label for="data_nascita" class="form-label">Data di nascita</label>
                <input type="text" class="form-control @error('data_nascita') is-invalid @enderror" id="data_nascita" name="data_nascita" autocomplete="off" placeholder="Seleziona la data" value="{{$actor->data_nascita}}">
            </div>

            <div class="mb-3">
                <label for="nazionalità" class="form-label">nazionalità</label>
                <input type="text" class="form-control @error('nazionalità') is-invalid @enderror" id="nazionalità" aria-describedby="nazionalità" name="nazionalità" value="{{$actor->nazionalità}}">
            </div>
            @error('nazionalità')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror

            <div class="mb-3">
                <label for="biografia" class="form-label">biografia</label>
                <textarea name="biografia" class="form-control @error('biografia') is-invalid @enderror" id="biografia" cols="30" rows="10">{{$actor->biografia}}"</textarea>
            </div>
            @error('biografia')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror


            <div class="mb-3">
                <label for="foto_url" class="form-label">foto_url</label>
                <input type="text" class="form-control @error('foto_url') is-invalid @enderror" id="foto_url" aria-describedby="foto_url" name="foto_url" value="{{$actor->foto_url}}">
            </div>
            @error('foto_url')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror

            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
        
    </div>
</div>
@endsection
