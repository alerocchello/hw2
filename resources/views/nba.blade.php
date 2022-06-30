@extends('layouts.skeleton')

@section('title', '| NBA')

@section('script')
<script src="{{ asset('js/nba.js') }}" defer></script>
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('css/home.css') }}">
@endsection

@section('content')
	<h2>Elenco delle squadre attualmente presenti in NBA</h2>
	<div id="teams"></div>

	<form id="search_player">
		<h2>Scrivi nome e cognome di un giocatore NBA per leggere i suoi dati</h2>
		<div>
			<input type="text" id="player"/>
			<input type="submit" value="Cerca">
			<div id="players-view"></div>
		</div>
	</form>
@endsection