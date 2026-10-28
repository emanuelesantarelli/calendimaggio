@extends('layouts.app')

@section('content')

<h1>Modifica Tipologia Associativa</h1>

<form
    action="/tipologie-associative/{{ $tipologia->tipologia_associativa_id }}"
    method="POST">

    @csrf
    @method('PUT')

    <p>

        Codice<br>

        <input
            type="text"
            name="codice"
            value="{{ old('codice', $tipologia->codice) }}"
            {{ $utilizzata ? 'readonly' : '' }}>


    </p>

    <p>

        Descrizione<br>

        <input
            type="text"
            name="descrizione"
            value="{{ $tipologia->descrizione }}">

    </p>

    <p>

        Quota Proposta (€)<br>

        <input
    type="number"
    step="0.01"
    name="quota_proposta"
    value="{{ old('quota_proposta', $tipologia->quota_proposta) }}"
    {{ $utilizzata ? 'readonly' : '' }}>

    </p>

    @if($utilizzata)

<div
    style="
    background:#fff3cd;
    color:#856404;
    padding:10px;
    margin-bottom:15px;
    border-radius:5px;">

    Questa tipologia è già utilizzata
    in uno o più tesseramenti.
    Codice e quota non sono modificabili.

</div>

@endif

    <p>

        <input
            type="checkbox"
            name="attiva"
            {{ $tipologia->attiva ? 'checked' : '' }}>

        Attiva

    </p>

    <button
        type="submit"
        class="btn-action btn-edit">

        💾 Salva Modifiche

    </button>

</form>

<p style="margin-top:20px;">

    <a href="/tipologie-associative">

        ← Torna alla lista

    </a>

</p>

@endsection