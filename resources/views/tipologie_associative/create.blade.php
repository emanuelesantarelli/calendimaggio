@extends('layouts.app')

@section('content')

<h1>Nuova Tipologia Associativa</h1>

<form action="/tipologie-associative"
       method="POST">

    @csrf

    <p>

        Codice<br>

        <input
            type="text"
            name="codice">

    </p>

    <p>

        Descrizione<br>

        <input
            type="text"
            name="descrizione">

    </p>

    <p>

        Quota Proposta (€)<br>

        <input
            type="number"
            step="0.01"
            name="quota_proposta">

    </p>

    <p>

        <input
            type="checkbox"
            name="attiva"
            checked>

        Attiva

    </p>

    <button
        type="submit"
        class="btn-action btn-edit">

        ➕ Salva Tipologia

    </button>

</form>

<p style="margin-top:20px;">

    <a href="/tipologie-associative">

        ← Torna alla lista

    </a>

</p>

@endsection