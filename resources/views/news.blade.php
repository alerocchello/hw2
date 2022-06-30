@extends('layouts.skeleton')

@section('title', '| News')

@section('script')
<script src="{{ asset('js/news.js') }}" defer></script>
<script type="text/javascript">
    const NEWS_ROUTE = "{{url('warehouse_news')}}";  
</script>
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('css/news.css') }}">
@endsection

@section('content')
<a href="{{ url('news') }}" class="title">Tutte le ultime notizie</a>
<div id="news"></div>
@endsection