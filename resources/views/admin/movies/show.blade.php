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
