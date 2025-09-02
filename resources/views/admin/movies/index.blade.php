@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Index</h1>
        <ol>
            @foreach ($listaMovie as $movie)
            <li>
                <a href="{{route('admin.movies.show', $movie->id)}}">
                    {{$movie->titolo}}
                </a>
            </li>
            @endforeach
        </ol>
    </div>
</div>
@endsection
