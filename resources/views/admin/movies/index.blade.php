@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('deleteMessage'))
        <div class="alert alert-success">
            {{ session('deleteMessage') }}
        </div>
    @endif

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

