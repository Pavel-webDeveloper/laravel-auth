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
        <form action="{{route('admin.movies.update', $movie->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titolo" class="form-label">titolo</label>
                <input type="text" class="form-control @error('titolo') is-invalid @enderror" id="titolo" aria-describedby="titolo" name="titolo" value="{{$movie->titolo}}">
            </div>
            @error('titolo')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror


            <div class="mb-3">
                <label for="regista" class="form-label">regista</label>
                <input type="text" class="form-control @error('regista') is-invalid @enderror" id="regista" aria-describedby="regista" name="regista" value="{{$movie->regista}}">
            </div>
            @error('regista')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror


            <div class="mb-3">
                <label for="durata" class="form-label">durata</label>
                <div class="durata-container d-flex">
                    <input type="number" name="ore" min="0" max="23" placeholder="Ore" class="form-control @error('ore') is-invalid @enderror" style="width: 80px;" value="{{ old('ore', $ore ?? 0) }}">
                    <input type="number" name="minuti" min="0" max="59" placeholder="Minuti" class="form-control @error('minuti') is-invalid @enderror" style="width: 80px;" value="{{ old('minuti', $minuti ?? 0) }}">
                    <input type="number" name="secondi" min="0" max="59" placeholder="Secondi" class="form-control @error('secondi') is-invalid @enderror" style="width: 80px;" value="{{ old('secondi', $secondi ?? 0) }}">
                </div>
            </div>


            <div class="mb-3">
                <label for="anno" class="form-label">anno</label>
                {{-- <input type="number" name="anno" min="1900" max="{{ date('Y') }}" placeholder="Anno" class="form-control"> --}}
                <select name="anno" class="form-select @error('anno') is-invalid @enderror" name="anno">
                    @for ($i = date('Y'); $i >= 1900; $i--)
                    {{-- ?? null coalescing operator.  --}}
                        <option value="{{ $i }}" {{ (old('anno', $movie->anno ?? '') == $i) ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            @error('anno')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror


            <div class="mb-3">
                <label for="nazione" class="form-label">nazione</label>
                <input type="text" class="form-control @error('nazione') is-invalid @enderror" id="nazione" aria-describedby="nazione" name="nazione" value="{{$movie->nazione}}">
            </div>
            @error('nazione')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror

            <div class="mb-3">
                <label for="category_id" class="form-label">category</label>
                <select name="category_id" id="category_id" class="@error('categpry_id') is-invalid @enderror">
                    <option value="" {{$movie->category_id == null ? 'selected' : ''}}>Nessuna</option>
                    @foreach ($listaCategorie as $cat)
                        <option value="{{$cat->id}}"
                            {{$movie->category && $movie->category->id == $cat->id ? 'selected' : ''}}>
                            {{$cat->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
              <div class="alert alert-danger">{{$message}}</div>  
            @enderror

            <div class="mb-3">
                <input type="checkbox" class="form-check-input" id="pubblicato" name="pubblicato" {{old('pubblicato', $movie->pubblicato) ? 'checked' : '' }}>
                <label for="pubblicato" class="form-label">pubblicato</label>
            </div>
            
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
        
    </div>
</div>
@endsection
