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
            value="{{ $tipologia->codice }}">

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
            value="{{ $tipologia->quota_proposta }}">

    </p>

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