@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('deleteMessage'))
        <div class="alert alert-success">
            {{ session('deleteMessage') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <h1>Attori</h1>
        <ol>
            @foreach ($listaAttori as $attore)
            <li>
                <a href="{{route('admin.actors.show', $attore->id)}}">
                    {{$attore->nome}} {{$attore->cognome}}
                </a>
            </li>
            @endforeach
        </ol>
    </div>
</div>
@endsection

