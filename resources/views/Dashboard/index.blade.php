@extends('layouts.app')

@section('content')

<h1>Dashboard</h1>

<div style="display:flex; gap:20px; flex-wrap:wrap;">

    <div style="
        background:white;
        border:1px solid #ccc;
        padding:20px;
        width:250px;
        border-radius:5px;">

        <h3>👥 Associati Totali</h3>

        <h2>{{ $totaleAssociati }}</h2>

    </div>

    <div style="
        background:white;
        border:1px solid #ccc;
        padding:20px;
        width:250px;
        border-radius:5px;">

        <h3>🎂 Compleanni del Mese</h3>

        @forelse($compleanni as $associato)

            <p>

                {{ date('d/m', strtotime($associato->data_nascita)) }}

                -

                {{ $associato->cognome }}

                {{ $associato->nome }}

            </p>

        @empty

            <p>Nessun compleanno questo mese</p>

        @endforelse

    </div>

</div>

@endsection