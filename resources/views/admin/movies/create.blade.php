@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create</h1>
    <div class="row justify-content-center">

        <form action="{{route('admin.movies.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="titolo" class="form-label">titolo</label>
                <input type="text" class="form-control" id="titolo" aria-describedby="titolo" name="titolo">
            </div>
            <div class="mb-3">
                <label for="regista" class="form-label">regista</label>
                <input type="text" class="form-control" id="regista" aria-describedby="regista" name="regista">
            </div>
            <div class="mb-3">
                <label for="durata" class="form-label">durata</label>
                <div class="durata-container d-flex">
                    <input type="number" name="ore" min="0" max="23" placeholder="Ore" class="form-control" style="width: 80px;" name="ore">
                    <input type="number" name="minuti" min="0" max="59" placeholder="Minuti" class="form-control" style="width: 80px;" name="minuti">
                    <input type="number" name="secondi" min="0" max="59" placeholder="Secondi" class="form-control" style="width: 80px;" name="secondi">
                </div>
            </div>
            <div class="mb-3">
                <label for="anno" class="form-label">anno</label>
                {{-- <input type="number" name="anno" min="1900" max="{{ date('Y') }}" placeholder="Anno" class="form-control"> --}}
                <select name="anno" class="form-select" name="anno">
                    @for ($i = date('Y'); $i >= 1900; $i--)
                        <option value="{{ $i }}" {{ (old('anno', $movie->anno ?? '') == $i) ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="mb-3">
                <label for="nazione" class="form-label">nazione</label>
                <input type="text" class="form-control" id="nazione" aria-describedby="nazione" name="nazione">
            </div>
            <div class="mb-3">
                <input type="checkbox" class="form-check-input" id="pubblicato" name="pubblicato">
                <label for="pubblicato" class="form-label">pubblicato</label>
            </div>
            
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
        
    </div>
</div>
@endsection
