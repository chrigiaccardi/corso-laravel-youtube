@extends('layouts.app')

@section('content')
<p>Questa Home è stata creata dinamicamente</p>

<!-- Se la sessione è stata creata con successo inserisce il messaggio di successo-->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Tasto Logout -->
@auth
<form action="{{route('logoutUser')}}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
@else
<a href="{{route('login')}}" class="btn btn-primary">Login</a>
@endauth

@endsection