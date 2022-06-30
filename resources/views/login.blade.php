@extends('layouts.guest')

@section('title', '| Login')


@section('content')
<h2>Accedi</h2>

<form name='login' method='post' action="{{ url('login') }}">

    @csrf
    <div class="control">
        <label><input type='text' name='username' placeholder="Nome utente"></label>
    </div>
    <div class="control">
        <label><input type='password' name='password' placeholder="Password"></label>    
    </div>
    @if(isset($errore))
        <p class = 'error' >{{ $errore }}</p>
    @endif
    <div class="control">
        <input type="submit" value="Invia">
    </div>

</form>
<p>Non hai ancora un account? <a href="{{ url('registration') }}">Registrati</a></p>
@endsection