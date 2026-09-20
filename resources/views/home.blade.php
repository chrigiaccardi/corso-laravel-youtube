@extends('layouts.app')

@section('content')
<p>Questa Home è stata creata dinamicamente</p>

<!-- Se la sessione è stata creata con successo inserisce il messaggio di successo-->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


@auth
<!-- Salutiamo l'utente loggato -->
<p>Ciao, {{ auth()->user()->name }}!</p>

@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<!-- Se l'utente ha l'immagine salvata nel DB -->
@if(auth()->user()->profile_image)
<!-- Asset serve per generare l'url pubblico di un asset e la concatenazione crea
l'url dinamico per recuperare l'immagine dell'utente loggato -->
<img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="" width="150">
@endif

<!-- Creiamo il form per caricare il file di avatar -->
<form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="profile_image">Carica la tua immagina:</label>
    <input type="file" name="profile_image" id="profile_image" required>
    <button type="submit">Carica Immagine</button>
</form>

<form action="{{route('logoutUser')}}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

@else
<a href="{{route('login')}}" class="btn btn-primary">Login</a>

@endauth

@endsection