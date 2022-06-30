@extends('layouts.shopping')

@section('title', '| Official online store')

@section('script')
<script src="{{ asset('js/cart.js') }}" defer></script>
<script type="text/javascript">
    const CART_ROUTE = "{{ url('return_cart') }}";
    const REMOVE_ROUTE = "{{ url('remove_from_cart') }}";  
</script>
@endsection

@section('content')
<nav>
    <h1 id="logo">AR sport</h1>
    <h1>Carrello</h1>
    <a href="{{ url('store') }}"><button><img src="./images/negozio.png" id="iconcart"> Compra ancora</button></a> 
</nav>

<section id="products-view"></section>
@endsection