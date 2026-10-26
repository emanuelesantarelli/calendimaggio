@extends('layouts.app')

@section('content')
<h1>Nuovo Associato</h1>

<form action="/associati" method="POST">

    @csrf

    <p>
        Cognome<br>
        <input type="text"
               id="cognome"
               name="cognome">
    </p>

    <p>
        Nome<br>
        <input type="text"
               id="nome"
               name="nome">
    </p>
    <p>

    Sesso<br>

    <select name="sesso"
            id="sesso">

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
        id="data_nascita"
        name="data_nascita">

    </p>
    <p>

    Nato in Italia?<br>

    <select
        id="nato_in_italia">

        <option value="SI" selected>
            SI
        </option>

        <option value="NO">
            NO
        </option>

    </select>

    </p>

    <div id="blocco_nazione_nascita">
    <p>
    Nazione Nascita<br>
        <input
            list="listaNazioni"
            id="nazione_nascita"
            name="nazione_nascita"
            value="Italia">

    <datalist id="listaNazioni">

    <option value="Italia">

    @foreach($statiEsteri as $stato)

        <option
            value="{{ $stato->nome_stato }}">
        </option>

    @endforeach

    </datalist>
    </p>
    </div>
    <div id="blocco_comune_nascita">
    <p>

    Comune Nascita<br>

        <input
    list="listaComuniNascita"
    id="comune_nascita"
    name="comune_nascita">

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

    <input
        type="hidden"
        id="codice_catastale_estero">

    </p>
    <p>

    Provincia Nascita<br>

    <input
        type="text"
        id="provincia_nascita"
        name="provincia_nascita">

    </p>
    </div>

    <div id="blocco_stato_estero">
    <p>
    Stato Estero Nascita<br>

    <input
        list="listaStatiEsteri"
        id="stato_estero_nascita"
        name="stato_estero_nascita">

    <datalist id="listaStatiEsteri">

        @foreach($statiEsteri as $stato)

            <option
                value="{{ $stato->nome_stato }}">
            </option>

        @endforeach

    </datalist>

    </p>
    </div>

    <p>

    Codice Fiscale<br>

    <input
        type="text"
        id="codice_fiscale"
        name="codice_fiscale">

    </p>
    <p>

        Indirizzo Residenza<br>
        <input type="text" name="indirizzo_residenza">
    </p>

    <p>
    
    CAP Residenza<br>
    <input type="text" name="cap_residenza">
    
    </p>
    <p>
    
    Comune Residenza<br>
    <input
    list="listaComuniResidenza"
    id="comune_residenza"
    name="comune_residenza">

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
           name="provincia_residenza">
    
    </p>
    <p>
    
    Nazione Residenza<br>
    <input type="text"
           id="nazione_residenza"
           name="nazione_residenza"
           value="Italia">

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
    <p>

    Nome Tutore<br>
    <input type="text" name="nome_tutore">
    </p>
    <p>
    
    Cognome Tutore<br>
    <input type="text" name="cognome_tutore">
    
    </p>
    <p>
    
    Cellulare Tutore<br>
    <input type="text" name="cellulare_tutore">
    
    </p>

    <hr>

<h3>Consensi Privacy</h3>

<p>

    <label>

        <input
            type="checkbox"
            name="privacy_accettata"
            value="1">

        Privacy accettata

    </label>

</p>

<p>

    <label>

        <input
            type="checkbox"
            name="riprese_audio_video"
            value="1">

        Autorizza foto e video

    </label>

</p>

<p>

    <label>

        <input
            type="checkbox"
            name="comunicazioni_commerciali"
            value="1">

        Autorizza comunicazioni

    </label>

</p>

<p>

    Data Consenso<br>

    <input
        type="date"
        name="data_consenso"
        value="{{ date('Y-m-d') }}">

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
<script>

document.addEventListener('DOMContentLoaded', function () {

    async function aggiornaComune(
        comuneId,
        provinciaId,
        nazioneId
    ) {

        const campoComune =
            document.getElementById(comuneId);

        if (!campoComune) {
            return;
        }

        const nomeComune = campoComune.value;

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

    const nascita =
        document.getElementById('comune_nascita');

    if (nascita) {

        nascita.addEventListener(
            'change',
            () => aggiornaComune(
                'comune_nascita',
                'provincia_nascita',
                'nazione_nascita'
            )
        );

    }

    const residenza =
        document.getElementById('comune_residenza');

    if (residenza) {

        residenza.addEventListener(
            'change',
            () => aggiornaComune(
                'comune_residenza',
                'provincia_residenza',
                'nazione_residenza'
            )
        );

    }

}); 

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
    
async function aggiornaStatoEstero() {

    const stato =
        document.getElementById(
            'stato_estero_nascita'
        ).value;

    if (!stato) {
        return;
    }

    const response =
        await fetch(
            '/api/stati-esteri/' +
            encodeURIComponent(stato)
        );

    if (!response.ok) {
        return;
    }

    const record =
        await response.json();

    if (!record) {
        return;
    }

    document.getElementById(
        'codice_catastale_nascita'
    ).value =
        record.codice_catastale;
    
    document.getElementById(
    'nazione_nascita'
).value =
    stato;

    generaCodiceFiscale();
}
document
    .getElementById('stato_estero_nascita')
    .addEventListener(
        'change',
        aggiornaStatoEstero
    );

    function aggiornaVisibilitaNascita() {

    const nazione =
        document.getElementById(
            'nazione_nascita'
        ).value;

    const blocco =
        document.getElementById(
            'blocco_stato_estero'
        );

    if (!blocco) {
        return;
    }

    if (
        nazione.toUpperCase() === 'ITALIA'
    ) {

        blocco.style.display = 'none';

    } else {

        blocco.style.display = 'block';

    }

}
document
    .getElementById('nazione_nascita')
    .addEventListener(
        'change',
        aggiornaVisibilitaNascita
    );

aggiornaVisibilitaNascita();
function aggiornaVisibilitaNascita() {

    const valore =
        document.getElementById(
            'nato_in_italia'
        ).value;

    const bloccoComune =
        document.getElementById(
            'blocco_comune_nascita'
        );

    const bloccoEstero =
        document.getElementById(
            'blocco_stato_estero'
        );

    const bloccoNazione =
        document.getElementById(
            'blocco_nazione_nascita'
        );

    if (valore === 'SI') {

        bloccoComune.style.display = 'block';

        bloccoEstero.style.display = 'none';

        bloccoNazione.style.display = 'none';

        document.getElementById(
            'nazione_nascita'
        ).value = 'Italia';

    }
    else {

        bloccoComune.style.display = 'none';

        bloccoEstero.style.display = 'block';

        bloccoNazione.style.display = 'none';

    }

}

document
    .getElementById(
        'nato_in_italia'
    )
    .addEventListener(
        'change',
        aggiornaVisibilitaNascita
    );

aggiornaVisibilitaNascita();
</script>
@endsection