@extends('layouts.skeleton')

@section('title', '| Matches')

@section('script')
<script src="{{ asset('js/matches.js') }}" defer></script>
<script type="text/javascript">
    const MATCHES_ROUTE = "{{url('warehouse_matches')}}";  
</script>
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('css/matches.css') }}">
@endsection

@section('content')
<a href="{{ url('matches') }}" class="title">Tutti gli eventi sportivi più attesi</a>
<div id="matches"></div>
<form class="hidden">
    <textarea type="text" id="comment" placeholder="Aggiungi un commento..."></textarea>
    <input type="submit" value="Invia">
</form>
<div id="comments"></div>
@endsection