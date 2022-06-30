@extends('layouts.shopping')

@section('title', '| Official online store')

@section('script')
<script src="{{ asset('js/store.js') }}" defer></script>
<script type="text/javascript">
    const TSHIRT_ROUTE = "{{ url('return_tshirt') }}";
    const ADD_ROUTE = "{{ url('add_to_cart') }}";  
</script>
@endsection

@section('content')
<nav>
    <h1 id="logo">AR sport</h1>
    <form id="search_team" method="GET">
        <input type='text' name="team" id="team" placeholder="Nome squadra">
        <input type="submit" value="Invia" id="submit">
    </form>
    <a href="{{ url('cart') }}"><button><img src="./images/carrello.png" id="iconcart"> Carrello</button></a> 
</nav>

<div id="intro">
    <h2>store</h2>
    <span>Acquista la maglietta della tua squadra del cuore</span>
</div>
    
<section id="divstore"></section>
@endsection