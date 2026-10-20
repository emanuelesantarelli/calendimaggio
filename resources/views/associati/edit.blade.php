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
            id="cognome"
            name="cognome"
            value="{{ $associato->cognome }}">
    </p>
    <p>
        Nome<br>

        <input
            type="text"
            id="nome"
            name="nome"
            value="{{ $associato->nome }}">
    </p>
    <p>

        Sesso<br>

        <select 
            id="sesso"
            name="sesso">

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
            id="data_nascita"
            name="data_nascita"
            value="{{ $associato->data_nascita }}">
    </p>
    <p>

        Comune Nascita<br>

        <input
            list="listaComuniNascita"
            id="comune_nascita"
            name="comune_nascita"
            value="{{ $associato->comune_nascita }}">

    <datalist id="listaComuniNascita">

    @foreach($comuni as $comune)

        <option
            value="{{ $comune->nome_comune }}">

        </option>

    @endforeach

    </datalist>

        <input
            type="hidden"
            id="codice_catastale_nascita">
    </p>

    <p>

        Provincia Nascita<br>

        <input
            type="text"
            id="provincia_nascita"
            name="provincia_nascita"
            value="{{ $associato->provincia_nascita }}">
    </p>
    
    <p>
    Nazione Nascita<br>
    <input
        type="text"
        id="nazione_nascita"
        name="nazione_nascita"
        value="{{ $associato->nazione_nascita }}">
    </p>

    <p>
         Codice Fiscale<br>

        <input
            type="text"
            id="codice_fiscale"
            name="codice_fiscale"
            value="{{ $associato->codice_fiscale }}">

    </p>
    <p>
    Indirizzo Residenza<br>
    <input type="text" name="indirizzo_residenza"
    value="{{ $associato->indirizzo_residenza }}">
    
    </p>

<p>
    CAP Residenza<br>
    <input type="text" name="cap_residenza" value="{{ $associato->cap_residenza }}">
</p>

<p>
    Comune Residenza<br>
    <input
    list="listaComuniResidenza"
    id="comune_residenza"
    name="comune_residenza"
    value="{{ $associato->comune_residenza }}">

<datalist id="listaComuniResidenza">

    @foreach($comuni as $comune)

        <option
            value="{{ $comune->nome_comune }}">

        </option>

    @endforeach

</datalist>
</p>

<p>
    Provincia Residenza<br>
    <input type="text"
           id="provincia_residenza"
           name="provincia_residenza" 
           value="{{ $associato->provincia_residenza }}">
</p>

<p>
    Nazione Residenza<br>
    <input type="text"
           id="nazione_residenza"
           name="nazione_residenza"
           value="{{ $associato->nazione_residenza }}">
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
   <p>
    Nome Tutore<br>
    <input type="text" name="nome_tutore" value="{{ $associato->nome_tutore }}">
    </p>

    <p>
    Cognome Tutore<br>
    <input type="text" name="cognome_tutore" value="{{ $associato->cognome_tutore }}">
    </p>

    <p>
    Cellulare Tutore<br>
    <input type="text" name="cellulare_tutore" value="{{ $associato->cellulare_tutore }}">
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
<script>

async function aggiornaComune(
    comuneId,
    provinciaId,
    nazioneId
) {

    const nomeComune =
        document.getElementById(comuneId).value;

    if (!nomeComune) {
        return;
    }

    const response =
        await fetch(
            '/api/comuni/' +
            encodeURIComponent(nomeComune)
        );

    if (!response.ok) {
        return;
    }

    const comune =
        await response.json();

    if (!comune) {
        return;
    }

    document.getElementById(provinciaId).value =
    comune.provincia ?? '';

    document.getElementById(nazioneId).value =
    comune.nazione ?? '';

    const catastale =
    document.getElementById(
        'codice_catastale_nascita'
    );

    if (catastale && comuneId === 'comune_nascita') {

    catastale.value =
        comune.codice_catastale ?? '';

    generaCodiceFiscale();

}

}

document
    .getElementById('comune_nascita')
    .addEventListener(
        'change',
        () => aggiornaComune(
            'comune_nascita',
            'provincia_nascita',
            'nazione_nascita'
        )
    );

document
    .getElementById('comune_residenza')
    .addEventListener(
        'change',
        () => aggiornaComune(
            'comune_residenza',
            'provincia_residenza',
            'nazione_residenza'
        )
    );

    async function generaCodiceFiscale() {

    const cognome =
        document.getElementById('cognome').value;

    const nome =
        document.getElementById('nome').value;

    const sesso =
        document.getElementById('sesso').value;

    const data =
        document.getElementById('data_nascita').value;

    const catastale =
        document.getElementById(
            'codice_catastale_nascita'
        ).value;

    if (
        !cognome ||
        !nome ||
        !sesso ||
        !data ||
        !catastale
    ) {
        return;
    }

    const response =
        await fetch(
            '/api/codice-fiscale?' +
            new URLSearchParams({
                cognome: cognome,
                nome: nome,
                sesso: sesso,
                data_nascita: data,
                codice_catastale: catastale
            })
        );

    if (!response.ok) {
        return;
    }

    const risultato =
        await response.json();

    document.getElementById(
        'codice_fiscale'
    ).value =
        risultato.codice_fiscale;

}

document
    .getElementById('cognome')
    .addEventListener('blur', generaCodiceFiscale);

document
    .getElementById('nome')
    .addEventListener('blur', generaCodiceFiscale);

document
    .getElementById('sesso')
    .addEventListener('change', generaCodiceFiscale);

document
    .getElementById('data_nascita')
    .addEventListener('change', generaCodiceFiscale);
</script>
@endsection