@extends('layouts.skeleton')

@section('title', '| Premier League')

@section('script')
<script src="{{ asset('js/premier.js') }}" defer></script>
@endsection

@section('style')
<link rel='stylesheet' href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <table id="classification">
        <caption>classifica premier league</caption>
        <thead>
            <tr>
                <td>Pos</td>
                <td>Logo</td>
                <td>Squadra</td>
                <td>PT</td>
                <td>G</td>
                <td>V</td>
                <td>N</td>
                <td>P</td>
                <td>GF</td>
                <td>GS</td>
                <td>DR</td>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection