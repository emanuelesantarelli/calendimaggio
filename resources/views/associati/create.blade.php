@extends('layouts.app')

@section('content')
<h1>Nuovo Associato</h1>

<form action="/associati" method="POST">

    @csrf

    <p>
        Cognome<br>
        <input type="text" name="cognome">
    </p>

    <p>
        Nome<br>
        <input type="text" name="nome">
    </p>
    <p>

    Sesso<br>

    <select name="sesso">

        <option value="M">
            Maschio
        </option>

        <option value="F">
            Femmina
        </option>

    </select>
    </p>
    <p>

    Data Nascita<br>

    <input
        type="date"
        name="data_nascita">

    </p>
    <p>

    Comune Nascita<br>

    <input
        type="text"
        name="comune_nascita">

    </p>
    <p>

    Provincia Nascita<br>

    <input
        type="text"
        name="provincia_nascita">

    </p>
    <p>

    Codice Fiscale<br>

    <input
        type="text"
        name="codice_fiscale">

    </p>
    <p>

    Cellulare<br>

    <input
        type="text"
        name="cellulare">

    </p>
    <p>
        Email<br>
        <input type="email" name="email">
    </p>
    <p>

    Stato Associato<br>

    <select name="stato_associato">

        <option value="ATTIVO">
            Attivo
        </option>

        <option value="SOSPESO">
            Sospeso
        </option>

        <option value="DIMESSO">
            Dimesso
        </option>

    </select>

    </p>

   <button
    type="submit"
    class="btn-action btn-edit">

    ➕ Salva Associato

</button>
    <p style="margin-top:20px;">

    <a href="/associati">

        ← Torna alla lista

    </a>
    </p>
</form>
@endsection