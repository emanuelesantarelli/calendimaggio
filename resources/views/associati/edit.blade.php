@extends('layouts.app')

@section('content')

<h1>Modifica Associato</h1>

<form action="/associati/{{ $associato->associato_id }}"
       method="POST">

    @csrf

    @method('PUT')

    <p>
        Cognome<br>

        <input
            type="text"
            name="cognome"
            value="{{ $associato->cognome }}">
    </p>
    <p>
        Nome<br>

        <input
            type="text"
            name="nome"
            value="{{ $associato->nome }}">
    </p>
    <p>

    Sesso<br>

    <select name="sesso">

        <option value="M"
            {{ $associato->sesso == 'M' ? 'selected' : '' }}>

            Maschio

        </option>

        <option value="F"
            {{ $associato->sesso == 'F' ? 'selected' : '' }}>

            Femmina

        </option>

    </select>

    </p>
    <p>
        Data Nascita<br>

        <input
            type="date"
            name="data_nascita"
            value="{{ $associato->data_nascita }}">
    </p>
    <p>

        Comune Nascita<br>

        <input
            type="text"
            name="comune_nascita"
            value="{{ $associato->comune_nascita }}">
    </p>
    <p>

        Provincia Nascita<br>

        <input
        type="text"
        name="provincia_nascita"
        value="{{ $associato->provincia_nascita }}">
    </p>
    
    <p>
         Codice Fiscale<br>

        <input
            type="text"
            name="codice_fiscale"
            value="{{ $associato->codice_fiscale }}">

    </p>
    <p>
        Cellulare<br>

        <input
            type="text"
            name="cellulare"
            value="{{ $associato->cellulare }}">

    </p>
     <p>
        Email<br>

        <input
            type="email"
            name="email"
            value="{{ $associato->email }}">
    </p>
    <p>

        Stato Associato<br>

         <select name="stato_associato">

            <option
               value="ATTIVO"
               {{ $associato->stato_associato == 'ATTIVO' ? 'selected' : '' }}>

             Attivo

            </option>

            <option
                value="SOSPESO"
                {{ $associato->stato_associato == 'SOSPESO' ? 'selected' : '' }}>

             Sospeso

            </option>

        </select>

    </p>
   

    <button
        type="submit"
        class="btn-action btn-edit">

        💾 Salva Modifiche

    </button>

</form>

<p style="margin-top:20px;">

    <a href="/associati">

        ← Torna alla lista

    </a>

</p>

@endsection