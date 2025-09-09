@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <form action="{{route('admin.actors.store')}}" method="POST" enctype="multipart/form-data" style="width: 80%">
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
                <label for="data_nascita" class="form-label" onclick="myAppJs.calendarioNascita()">Data di nascita</label>
                <input type="text" class="form-control" id="data_nascita" name="data_nascita" autocomplete="off" placeholder="Seleziona la data" onclick="myAppJs.calendarioNascita()">
            </div>
            <div class="mb-3">
                <label for="nazionalità" class="form-label">nazionalità</label>
                <input type="text" class="form-control" id="nazionalità" aria-describedby="nazionalità" name="nazionalità">
            </div>
            <div class="mb-3">
                <label for="biografia" class="form-label">biografia</label>
                <textarea name="biografia" class="form-control" id="biografia" cols="30" rows="10"></textarea>
            </div>
            {{-- <div class="mb-3">
                <label for="foto_url" class="form-label">foto_url</label>
                <input type="text" class="form-control" id="foto_url" aria-describedby="foto_url" name="foto_url">
            </div> --}}
            <div class="mb-3 d-flex">
                <img id="uploadPreview" src="https://place-hold.it/300" alt="immagine-placeholder" width="100" style="margin-right: 20px;">
                <div>
                    <label for="foto_url" class="form-label">foto_url</label>
                    <input type="file" class="form-control" id="foto_url" aria-describedby="foto_url" name="foto_url" onchange="myAppJs.previewImage()">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
        
    </div>
</div>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript" defer></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas); defer</script>
@endsection
