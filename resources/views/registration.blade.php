@extends('layouts.guest')

@section('title', '| Registration')

@section('script')
<script src="{{ asset('js/registration.js') }}" defer></script>
<script type="text/javascript">
    const REGISTRATION_ROUTE = "{{ url('registration')}}";
</script>
@endsection


@section('content')

<h2>Registrati</h2>

<form name='registration' method='post' enctype='multipart/form-data' action="{{ url('registration') }}">
    
    @csrf
    <div class="name control">
        <label><input type='text' name='name' placeholder="Nome" value='{{ old("name") }}' ></label>
        <span></span>
    </div>
    <div class="surname control">
        <label><input type='text' name='surname' placeholder="Cognome" value='{{ old("surname") }}' ></label>
        <span></span>
    </div>
    <div class="username control">
        <label><input type='text' name='username' placeholder="Nome utente" value='{{ old("username") }}' ></label>
        <span></span>
    </div>
    <div class="email control">
        <label><input type='text' name='email' placeholder="E-mail" value='{{ old("email") }}' ></label>
        <span></span>
    </div>
    <div class="password control">
        <label><input type='password' name='password' placeholder="Password" ></label>
        <span></span>  
    </div>
    <div class="conf_password control">
        <label><input type='password' name='conf_password' placeholder="Conferma password" ></label>
        <span></span>
    </div>
    @if(isset($errore))
        <p class="error">{{$errore}}</p>
    @endif
    <div class="control">
        <input type="submit" value="Invia">    
    </div>

</form>

<p>Hai già un account? <a href="{{ url('login') }}">Accedi</a></p>

@endsection