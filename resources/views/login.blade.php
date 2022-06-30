@extends('layouts.guest')

@section('title', '| Login')


@section('content')
<h2>Accedi</h2>

<form name='login' method='post' action="{{ url('login') }}">

    @csrf
    <div class="control">
        <label><input type='text' name='username' placeholder="Nome utente"></label>
        <!-- <span>&nbsp;@error('username') {{ $message }} @enderror @error('email') {{ $message }} @enderror</span> -->
    </div>
    <div class="control">
        <label><input type='password' name='password' placeholder="Password"></label>    
    </div>
    <span><input type="checkbox"> Ricordami</span>
    <div class="control">
        <input type="submit" value="Invia">
    </div>

</form>
<p>Non hai ancora un account? <a href="{{ url('registration') }}">Registrati</a></p>
@endsection


<!-- Da controllare
{{-- 
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
--}}
