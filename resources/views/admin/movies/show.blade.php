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
        </ul>
    </div>
    <a href="{{route('admin.movies.edit', $movie->id)}}" class="btn btn-warning">Modifica</a>
</div>
@endsection
