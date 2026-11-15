@php

$sottoscritto =
    $associato->sesso == 'F'
        ? 'La sottoscritta'
        : 'Il sottoscritto';

$nato =
    $associato->sesso == 'F'
        ? 'nata'
        : 'nato';

@endphp

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <style>

        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        .header {
            margin-bottom: 25px;
        }

        .logo {
            height: 120px;
        }

        h1 {
            margin-bottom: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 6px;
            border: 1px solid #cccccc;
        }

        .section-title {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
        }

    </style>

</head>

<body>

    <table
    style="
        width:100%;
        border:none;
        margin-bottom:25px;">

    <tr>

        <td
            style="
                width:120px;
                border:none;
                vertical-align:top;">

            @if($impostazioni->logo_path)

                <img
                    src="{{ storage_path('app/public/images/stemma_nuovo.jpg') }}"
                    class="logo">

            @endif

        </td>

        <td
            style="
                border:none;
                vertical-align:top;
                text-align:right;">

            <h1
                style="
                    margin:0;
                    font-size:28px;">

                {{ $impostazioni->nome_associazione }}

            </h1>

            <div style="margin-top:5px;
                        font-size:9px;
                        line-height:1.3;">

                {{ $impostazioni->indirizzo }}

                <br>

                {{ $impostazioni->cap }}
                {{ $impostazioni->citta }}
                ({{ $impostazioni->provincia }})

                <br>

                CF:
                {{ $impostazioni->codice_fiscale }}

                <br>

                P. IVA:
                {{ $impostazioni->partita_iva }}

                <br>

                Email:
                {{ $impostazioni->email }}

                <br>

                PEC:
                {{ $impostazioni->pec }}

                <br>

                Tel:
                {{ $impostazioni->telefono }}

            </div>

        </td>

    </tr>

</table>

<h2
    style="
        text-align:center;
        margin-top:30px;">

    DOMANDA DI AMMISSIONE A SOCIO
</h2>
<h3
    style="
        text-align:center;">
    E
    RICHIESTA DI TESSERAMENTO ANNUALE
</h3>
<p
    style="
        margin-top:20px;
        margin-bottom:20px;">
    <strong>
        AL CONSIGLIO DIRETTIVO
        DELLA {{ strtoupper($impostazioni->nome_associazione) }}
    </strong>
</p>

<div
    style="
        margin-top:15px;
        margin-bottom:20px;
        line-height:1.4;">

    {{ $sottoscritto }}

    <strong>

        {{ strtoupper($associato->nome) }}
        {{ strtoupper($associato->cognome) }}

    </strong>

    <br><br>

    {{ $nato }}

    a

    <strong>

        {{ $datiModulo['luogoNascita'] }}
        ({{ $datiModulo['provinciaNascita'] }})

    </strong>

    il

    <strong>

        {{ $associato->data_nascita?->format('d-m-Y') }}

    </strong>

    ,

    codice fiscale

    <strong>

        {{ $associato->codice_fiscale }}

    </strong>

    ,

    <br>

    residente in

    <strong>

        {{ $associato->indirizzo_residenza }}

    </strong>

    ,

    {{ $associato->cap_residenza }}

    <strong>

        {{ strtoupper($associato->comune_residenza) }}

    </strong>

    ({{ $associato->provincia_residenza }})

    ,

    <br>

    telefono

    <strong>

        {{ $associato->cellulare }}

    </strong>

    ,

    e-mail

    <strong>

        {{ $associato->email }}

    </strong>

</div>

</div>

<h3
    style="
        text-align:center;
        margin-top:25px;
        margin-bottom:25px;">

    CHIEDE

</h3>

<p>

    di essere ammesso quale socio della

    <strong>
        {{ $impostazioni->nome_associazione }}
    </strong>

    per l'anno associativo

    <strong>
        {{ $tesseramento->anno }}
    </strong>

</p>

<div
    style="
        width:70%;
        margin:20px auto;
        border:1px solid #666;
        padding:12px;">

    <div
    style="
        text-align:center;
        font-weight:bold;
        background:#eeeeee;
        padding:6px;
        margin:-15px -15px 10px -15px;">

    RICHIESTA DI TESSERAMENTO

</div>

    <table
    style="
        width:100%;
        border:none;
        margin-top:5px;">

    <tr>
        <td
            style="
                width:40%;
                border:none;
                padding:2px 0;">

            Anno Associativo:

        </td>

        <td
            style="
                border:none;
                padding:2px 0;">

            <strong>
                {{ $tesseramento->anno }}
            </strong>

        </td>
    </tr>

    <tr>
        <td
            style="
                border:none;
                padding:2px 0;">

            Tipologia Richiesta:

        </td>

        <td
            style="
                border:none;
                padding:2px 0;">

            <strong>
                {{
                    $tesseramento
                        ->tipologiaAssociativa
                        ->descrizione
                }}
            </strong>

        </td>
    </tr>

    <tr>
        <td
            style="
                border:none;
                padding:2px 0;">

            Quota Associativa:

        </td>

        <td
            style="
                border:none;
                padding:2px 0;">

            <strong>

                €
                {{
                    number_format(
                        $tesseramento->importo_quota,
                        2,
                        ',',
                        '.'
                    )
                }}

            </strong>

        </td>
    </tr>

    <tr>
        <td
            style="
                border:none;
                padding:2px 0;">

            Validità:

        </td>

        <td
            style="
                border:none;
                padding:2px 0;">

            <strong>

                {{ $tesseramento->data_adesione?->format('d-m-Y') }}

                -

                {{ $tesseramento->data_scadenza?->format('d-m-Y') }}

            </strong>

        </td>
    </tr>

</table>

</div>
<h3
    style="
        text-align:center;
        margin-top:30px;
        margin-bottom:20px;">

    DICHIARA

</h3>
<div
    style="
        text-align:justify;
        line-height:1.3;">

    <p style="margin:3px 0;">
    
    <p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:3px 0;">

        - di aver preso visione dello Statuto
        dell'Associazione e di accettarne
        integralmente contenuti, finalità e
        disposizioni;

    </p>

    <p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:3px 0;">

        - di non essere tesserato, per il medesimo
        periodo associativo, presso altra
        Associazione partecipante all'Ente
        Calendimaggio di Assisi;

    </p>

    <p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:3px 0;">

        - di impegnarsi al rigoroso rispetto
        dello Statuto, dei Regolamenti e delle
        deliberazioni adottate dagli organi
        dell'Associazione;

    </p>

    <p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:3px 0;">

        - di essere a conoscenza delle norme
        disciplinari previste dall'Associazione;

    </p>

    <p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:3px 0;">

        - di essere a conoscenza che la presente
        richiesta di ammissione potrà essere
        accolta o respinta dal Consiglio Direttivo;

    </p>

    <p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:3px 0;">

        - di essere a conoscenza che il
        tesseramento ha validità fino al termine
        dell'anno associativo.

    </p>

</div>
</body>
</html>