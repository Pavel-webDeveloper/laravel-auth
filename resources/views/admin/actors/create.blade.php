@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <form action="{{route('admin.actors.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">nome</label>
                <input type="text" class="form-control" id="nome" aria-describedby="nome" name="nome">
            </div>
            <div class="mb-3">
                <label for="cognome" class="form-label">cognome</label>
                <input type="text" class="form-control" id="cognome" aria-describedby="cognome" name="cognome">
            </div>
            <div class="mb-3">
                <label for="data_nascita" class="form-label">Data di nascita</label>
                <input type="text" class="form-control" id="data_nascita" name="data_nascita" autocomplete="off" placeholder="Seleziona la data">
            </div>
            <div class="mb-3">
                <label for="nazionalità" class="form-label">nazionalità</label>
                <input type="text" class="form-control" id="nazionalità" aria-describedby="nazionalità" name="nazionalità">
            </div>
            <div class="mb-3">
                <label for="biografia" class="form-label">biografia</label>
                <textarea name="biografia" class="form-control" id="biografia" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="foto_url" class="form-label">foto_url</label>
                <input type="text" class="form-control" id="foto_url" aria-describedby="foto_url" name="foto_url">
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
        
    </div>
</div>
@endsection
