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
@endsection