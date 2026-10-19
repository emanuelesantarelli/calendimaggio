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

    </p>
    <p>

    Provincia Nascita<br>

    <input
        type="text"
        id="provincia_nascita"
        name="provincia_nascita">

    </p>

    <p>
    Nazione Nascita<br>
        <input
            type="text"
            id="nazione_nascita"
            name="nazione_nascita"
            value="Italia">
    </p>

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
function codiceCognome(cognome) {

    cognome = cognome.toUpperCase();

    const consonanti =
        cognome.replace(/[^BCDFGHJKLMNPQRSTVWXYZ]/g, '');

    const vocali =
        cognome.replace(/[^AEIOU]/g, '');

    let risultato =
        consonanti +
        vocali +
        'XXX';

    return risultato.substring(0, 3);

}
function codiceNome(nome) {

    nome = nome.toUpperCase();

    const consonanti =
        nome.replace(/[^BCDFGHJKLMNPQRSTVWXYZ]/g, '');

    const vocali =
        nome.replace(/[^AEIOU]/g, '');

    if (consonanti.length >= 4) {

        return (
            consonanti[0] +
            consonanti[2] +
            consonanti[3]
        );

    }

    let risultato =
        consonanti +
        vocali +
        'XXX';

    return risultato.substring(0, 3);

}
function codiceMese(data) {

    const mese = parseInt(
        data.substring(5, 7)
    );

    const mesi = {
        1: 'A',
        2: 'B',
        3: 'C',
        4: 'D',
        5: 'E',
        6: 'H',
        7: 'L',
        8: 'M',
        9: 'P',
        10: 'R',
        11: 'S',
        12: 'T'
    };

    return mesi[mese];

}
function codiceGiorno(data, sesso) {

    let giorno = parseInt(
        data.substring(8, 10)
    );

    if (sesso === 'F') {
        giorno += 40;
    }

    return giorno
        .toString()
        .padStart(2, '0');

}
function carattereControllo(cfParziale) {

    const caratteri =
        'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    let somma = 0;

    for (let i = 0; i < cfParziale.length; i++) {
        somma += cfParziale.charCodeAt(i);
    }

    return caratteri[somma % 26];

}
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