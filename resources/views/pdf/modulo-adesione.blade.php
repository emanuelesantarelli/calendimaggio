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

        .privacy {

    font-size: 7.4px;
    line-height: 1;
    text-align: justify;

}

.privacy-title {

    font-size: 12px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 15px;

}

.privacy-section {

    font-weight: bold;
    margin-top: 2px;
    margin-bottom: 1px;

}

.signature-line {

    border-top: 1px solid #000;
    margin-top: 35px;
    width: 250px;

}

.privacy p {

    margin-top: 0px;
    margin-bottom: 0px;

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
<div style="page-break-before: always;"
>
</div>
<div class="privacy">

    <div
    style="
        text-align:center;
        font-size:8px;
        font-weight:bold;
        margin-bottom:15px;">

    INFORMATIVA PER IL TRATTAMENTO
    DEI DATI PERSONALI E LIBERATORIA

</div>
<div class="privacy-section">
    1. TITOLARE DEL TRATTAMENTO
</div>

<p>

    Ai sensi degli artt. 4 e 24 del Reg. UE
    2016/679 il titolare del trattamento è
    l’Associazione
    "{{ $impostazioni->nome_associazione }}",
    avente sede legale in
    {{ $impostazioni->indirizzo }}
    {{ $impostazioni->cap }}
    {{ $impostazioni->citta }}
    ({{ $impostazioni->provincia }}).

</p>

<p>

    Ai sensi degli artt. 4 e 28 del Reg. UE
    2016/679, il Responsabile del trattamento
    dei dati è il Priore Maggiore in carica.

</p>
<div class="privacy-section">

    2. DATI OGGETTO DEL TRATTAMENTO

</div>

<p style="
        padding-left:15px;
        text-indent:-15px;">

    Il Titolare del Trattamento tratta i dati personali identificativi 
    (ad esempio, nome, cognome, indirizzo, telefono, e-mail, cod. fisc.), 
    comunicati dall’interessato in occasione dell’adesione all’associazione.

</p>

<div class="privacy-section">

    3.	FINALITÀ E LICEITA’ DEL TRATTAMENTO

</div>
<p>

    I dati di natura personale forniti saranno
    oggetto di trattamento nel rispetto delle
    condizioni di liceità ex art. 6 lett. b del
    Reg. UE 2016/679, ovvero per l’adesione e la
    partecipazione all’associazione e lo
    svolgimento delle attività proposte a favore
    degli associati, ed in particolare:

</p>
<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • iscrizione nel libro soci;

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • partecipazione alla vita associativa;

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • informazione sulle attività e sulle altre
      iniziative proposte;

</p>
<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • eventuale compilazione di form di raccolta dati 
      per l’invio di una richiesta informazioni al titolare del trattamento;

</p>
<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • adempiere agli obblighi contrattuali, di legge e finalità 
      amministrativo-contabile. Ai fini dell’applicazione delle disposizioni 
      in materia di protezione dei dati personali, i trattamenti effettuati 
      per finalità amministrativo-contabili sono quelli connessi allo svolgimento 
      delle attività di natura organizzativa, amministrativa, finanziaria e contabile, 
      a prescindere dalla natura dei dati trattati;

</p>
<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • adempiere agli obblighi previsti dalla legge, da un regolamento, dalla normativa 
        comunitaria o da un ordine dell’Autorità (come, ad esempio, in materia di antiriciclaggio);

</p>
<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • esercitare i diritti del Titolare, ad esempio il diritto di difesa in giudizio;

</p>
<div class="privacy-section">

    4. DESTINATARI O CATEGORIE DI DESTINATARI DEI DATI

</div>

<p>

    I dati di natura personale forniti potranno essere comunicati
    a destinatari, nominati ex art. 28 del Reg. UE 2016/679,
    che tratteranno i dati in qualità di responsabili e/o in qualità
    di persone fisiche che agiscono sotto l’autorità del Titolare e del
    Responsabile del trattamento, al fine di ottemperare ai contratti
    o finalità connesse.

</p>

<p>

    Precisamente, i dati potranno essere comunicati a destinatari
    appartenenti alle seguenti categorie:

</p>

<p style="padding-left:15px;text-indent:-15px;margin:1px 0;">
    • soggetti che forniscono servizi per la gestione del sistema informatico e delle reti di comunicazione del Titolare del Trattamento;
</p>

<p style="padding-left:15px;text-indent:-15px;margin:1px 0;">
    • studi o società nell’ambito di rapporti di assistenza e consulenza;
</p>

<p style="padding-left:15px;text-indent:-15px;margin:1px 0;">
    • autorità competenti per adempimenti di obblighi di legge e/o di disposizioni di organi pubblici, su richiesta;
</p>

<p>

    I soggetti appartenenti alle categorie suddette svolgono la funzione
    di Responsabile del trattamento dei dati, oppure operano in totale
    autonomia come distinti Titolari del trattamento.

</p>

<p>

    I dati di natura personale forniti potranno essere comunicati all’Ente
    Calendimaggio di Assisi, per finalità statistiche, assicurative e scopi
    economico/sponsorizzativi.

</p>
<div class="privacy-section">

    5. TRASFERIMENTO DATI VERSO UN PAESE TERZO E/O UN’ORGANIZZAZIONE INTERNAZIONALE

</div>

<p>

    I dati di natura personale forniti dall’interessato non saranno
    trasferiti all’estero all’interno o all’esterno dell’Unione Europea.

</p>
<div class="privacy-section">

    6. MODALITA’ DI TRATTAMENTO

</div>

<p>

    Il trattamento dei dati personali dell’interessato è realizzato
    per mezzo delle operazioni indicate all’art. 4 n. 2) GDPR del
    Reg. UE 2016/679 e precisamente: raccolta, registrazione,
    organizzazione, conservazione, consultazione, elaborazione,
    modificazione, selezione, estrazione, raffronto, utilizzo,
    interconnessione, blocco, comunicazione, cancellazione e
    distruzione dei dati.

</p>

<p>

    I dati personali sono sottoposti a trattamento sia cartaceo
    che elettronico e/o automatizzato.

</p>
<div class="privacy-section">

    7. PERIODO DI CONSERVAZIONE DEI DATI

</div>

<p>

    Il trattamento sarà svolto in forma automatizzata e/o manuale,
    con modalità e strumenti volti a garantire la massima sicurezza
    e riservatezza, ad opera di soggetti a ciò appositamente incaricati.

</p>

<p>

    Nel rispetto di quanto previsto dall’art. 5 comma 1 lett. e)
    del Reg. UE 2016/679 i dati personali raccolti verranno
    conservati in una forma che consenta l’identificazione degli
    interessati per un arco di tempo non superiore al conseguimento
    delle finalità per le quali i dati personali sono trattati.

</p>
<div class="privacy-section">

    8. NATURA DEL CONFERIMENTO E RIFIUTO

</div>

<p>

    Il conferimento dei dati personali per le finalità di cui
    al punto 3 del presente documento informativo è necessario
    per dare seguito all’adesione all’associazione.

</p>

<p>

    Il mancato conferimento dei dati personali può comportare
    l’impossibilità di ottenere tale adesione.

</p>
<div class="privacy-section">

    9. DIRITTI DEGLI INTERESSATI

</div>

<p>

    L’interessato potrà far valere i propri diritti
    come espressi dagli artt. 15, 16, 17, 18, 19,
    20, 21 e 22 del Regolamento UE 2016/679,
    rivolgendosi al Titolare del Trattamento,
    tramite l’indirizzo di posta elettronica:

    {{ $impostazioni->pec }}

</p>

<p>

    L’interessato ha il diritto, in qualunque momento, di:

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • ottenere la conferma dell'esistenza o meno di dati personali che lo riguardano,
      anche se non ancora registrati, e la loro comunicazione in forma intelligibile;

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • ottenere l'indicazione dell'origine dei dati personali, delle finalità e modalità
      del trattamento, della logica applicata in caso di trattamento effettuato con
      strumenti elettronici e degli estremi identificativi del titolare, dei responsabili
      e dei soggetti ai quali i dati possono essere comunicati;

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • ottenere l'aggiornamento, la rettificazione o l'integrazione dei dati;

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • ottenere la cancellazione, la trasformazione in forma anonima o il blocco dei dati
      trattati in violazione di legge;

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • ottenere l'attestazione che le operazioni di aggiornamento, rettifica o cancellazione
      siano state portate a conoscenza dei soggetti ai quali i dati sono stati comunicati;

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • opporsi, in tutto o in parte, per motivi legittimi al trattamento dei dati personali
      che lo riguardano;

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • opporsi al trattamento dei dati personali effettuato per finalità promozionali,
      pubblicitarie, commerciali o di marketing mediante strumenti automatizzati,
      posta elettronica, telefono o posta cartacea;

</p>

<p>

    Ove applicabili, l’interessato ha altresì i diritti di cui agli artt. 16-21 GDPR
    (diritto di rettifica, diritto all’oblio, diritto di limitazione del trattamento,
    diritto alla portabilità dei dati e diritto di opposizione).

</p>

<p>

    Fatto salvo ogni altro ricorso amministrativo e giurisdizionale,
    qualora l’interessato ritenga che il trattamento dei dati che lo riguardano
    violi quanto previsto dal Reg. UE 2016/679, ha il diritto di proporre reclamo
    al Garante per la protezione dei dati personali.

</p>

<p>

    Con riferimento all’art. 6 par. 1 lett. a) e all’art. 9 par. 2 lett. a)
    del Reg. UE 2016/679, l’interessato ha il diritto di revocare in qualsiasi
    momento il consenso precedentemente prestato.

</p>

<p>

    Nel caso di richiesta di portabilità del dato, il Titolare del trattamento
    fornirà in un formato di uso comune e leggibile i dati personali che riguardano
    l’interessato, fatto salvo quanto previsto dall’art. 20 commi 3 e 4
    del Reg. UE 2016/679.

</p>
<div class="privacy-section">

    10. AGGIORNAMENTI E MODIFICHE

</div>

<p>

    Il Titolare del trattamento si riserva il diritto
    di modificare, integrare o aggiornare periodicamente
    la presente Informativa in ossequio alla normativa
    applicabile o ai provvedimenti adottati dal Garante
    per la Protezione dei dati personali.

</p>

<p>

    Le suddette modifiche o integrazioni saranno portate
    a conoscenza degli interessati.

</p>
<hr style="margin-top:4px; margin-bottom:3px;">
<div class="privacy-section">

    11. LIBERATORIA E AUTORIZZAZIONE ALLE RIPRESE AUDIO/VIDEO

</div>

<p>

    In riferimento al trattamento dei dati sotto riportati il socio:

</p>

<table
    style="
        width:100%;
        border:none;
        margin-top:4px;
        margin-bottom:6px;">

    <tr>

        <td
            style="
        width:50%;
        border:none;
        text-align:center;
        font-weight:bold;">

            @if(
                $associato->consensoPrivacy &&
                $associato->consensoPrivacy->riprese_audio_video
            )

                ☑ AUTORIZZA

            @else

                ☐ AUTORIZZA

            @endif

        </td>

        <td
            style="
                border:none;
                text-align:center;
                font-weight:bold;">

            @if(
                $associato->consensoPrivacy &&
                !$associato->consensoPrivacy->riprese_audio_video
            )

                ☑ NON AUTORIZZA

            @else

                ☐ NON AUTORIZZA

            @endif

        </td>

    </tr>

</table>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • ad effettuare eventuali riprese fotografiche,
    televisive e/o registrazioni audio,
    anche realizzate da soggetti terzi
    autorizzati dall'organizzazione medesima,
    su pellicola, nastro o qualsiasi altro supporto;

</p>

<p
    style="
        padding-left:15px;
        text-indent:-15px;
        margin:1px 0;">

    • ad utilizzare, anche a mezzo di soggetti
    terzi autorizzati, le riprese e/o registrazioni
    di cui sopra, sia nella loro integrità sia
    in modo parziale, in sede televisiva,
    radiofonica, Internet, audiovisiva ecc.,
    in qualunque forma e modo e con qualsiasi
    mezzo tecnico;

</p>

<p>

    Il sottoscritto dichiara inoltre di non avere
    nulla da pretendere dall'Associazione

    <strong>
        {{ $impostazioni->nome_associazione }}
    </strong>

    e/o dai suoi aventi causa in merito
    all'utilizzazione dei filmati e del materiale
    audio e video così come sopra indicato
    e per la partecipazione agli eventi organizzati.

</p>
<hr
    style="
        margin-top:8px;
        margin-bottom:6px;">

<div class="privacy-section">

    12. COMUNICAZIONI A CARATTERE COMMERCIALE

</div>

<p>

    Con riferimento all’Informativa nei confronti di
    persone giuridiche, enti o associazioni,
    la persona fisica munita dei necessari poteri
    volti a rappresentare la volontà della persona
    giuridica, ente, associazione o soggetto assimilabile
    esprime liberamente il consenso al trattamento dei
    propri dati da parte dell’Associazione

    <strong>
        {{ $impostazioni->nome_associazione }}
    </strong>

    per comunicazioni a carattere promozionale,
    pubblicitario o commerciale e per l’offerta di
    prodotti o servizi di soggetti terzi mediante
    sistemi automatizzati di chiamata senza
    l’intervento di un operatore e mediante posta
    elettronica, telefax, SMS, MMS o altri sistemi
    analoghi, nonché per indagini statistiche
    e di mercato finalizzate alla rilevazione
    del grado di soddisfazione degli utenti.

</p>

<table
    style="
        width:100%;
        border:none;
        margin-top:4px;
        margin-bottom:6px;">

    <tr>

        <td
            style="
                width:50%;
                border:none;
                text-align:center;
                font-weight:bold;">

            @if(
                $associato->consensoPrivacy &&
                $associato->consensoPrivacy->comunicazioni_commerciali
            )

                ☑ AUTORIZZA

            @else

                ☐ AUTORIZZA

            @endif

        </td>

        <td
            style="
                border:none;
                text-align:center;
                font-weight:bold;">

            @if(
                $associato->consensoPrivacy &&
                !$associato->consensoPrivacy->comunicazioni_commerciali
            )

                ☑ NON AUTORIZZA

            @else

                ☐ NON AUTORIZZA

            @endif

        </td>

    </tr>

</table>

<hr
    style="
        margin-top:4px;
        margin-bottom:4px;">

<p
    style="
        margin-top:2px;
        margin-bottom:6px;">

    Letta l'informativa privacy sopra riportata,
    si manifesta il consenso al trattamento dei dati
    come previsto dai punti da 1 a 10.

</p>

<table
    style="
        width:100%;
        border:none;
        margin-top:8px;">

    <tr>

        <td
            style="
                width:45%;
                border:none;
                text-align:center;">

            Assisi, lì __________________

            <br><br>

            Firma del partecipante

            <br><br><br>

            ___________________________

        </td>

        <td
            style="
                width:10%;
                border:none;">

        </td>

        <td
            style="
                width:45%;
                border:none;
                text-align:center;">

            Genitore/Tutore
            (solo se minorenne)

            <br><br><br>

            ___________________________

            <br><br>

            Nome e Cognome

            <br><br>

            ___________________________

        </td>

    </tr>

</table>

</body>
</html>