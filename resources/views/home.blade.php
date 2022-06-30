@extends('layouts.skeleton')

@section('title', '| Home page')

@section('script')
<script src="{{ asset('js/home.js') }}" defer></script>
<script type="text/javascript">
    const HOME_ROUTE = "{{ url('home') }}";
    const NEWS_ROUTE = "{{ url('warehouse_news') }}";
    const MATCHES_ROUTE = "{{ url('warehouse_matches') }}";
    const SPOTIFY_ROUTE = "{{ url('spotify') }}";
</script>
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <section>

        <a href="{{ url('news') }}" class="link_statistics_title">Ultime notizie</a>
        <h2>News, approfondimenti e il meglio dello sport</h2>
        <div id="news"></div>
        
        <a href="{{ url('matches') }}" class="link_statistics_title" id="second">Eventi sportivi più attesi</a>
        <div id="buttons2">
            <a class="button">Acquista biglietti</a>
            <a class="button">TV e streaming</a>
        </div>
        
        <div id="events"></div>

        <img src="./images/spotify.png" id="logo_spotify">
        <form id="spotify">            
            <h2>Scrivi il nome e scegli un album musicale<br>
                Noi lo riprodurremo in sottofondo</h2>
            <input type="text" id="album" />
            <input type="submit" value="Cerca">
            <div id="album-view"></div>
        </form>

    </section>
@endsection