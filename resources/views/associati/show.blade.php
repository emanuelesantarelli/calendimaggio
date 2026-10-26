@extends('layouts.app')

@section('content')

<h1>Dettaglio Associato</h1>

<h2>
    {{ $associato->cognome }}
    {{ $associato->nome }}
</h2>

<hr>

<h3>Dati Anagrafici</h3>

<p><strong>Numero Associato:</strong> {{ $associato->numero_associato }}</p>

<p><strong>Nome:</strong> {{ $associato->nome }}</p>

<p><strong>Cognome:</strong> {{ $associato->cognome }}</p>

<p><strong>Sesso:</strong> {{ $associato->sesso }}</p>

<p><strong>Data Nascita:</strong> {{ $associato->data_nascita }}</p>

<p>

    <strong>Luogo Nascita:</strong>

    @if(strtoupper($associato->nazione_nascita) == 'ITALIA')

        {{ $associato->comune_nascita }}
        ({{ $associato->provincia_nascita }})

    @else

        {{ $associato->nazione_nascita }}
        (EE)

    @endif

</p>

<p><strong>Codice Fiscale:</strong> {{ $associato->codice_fiscale }}</p>

<hr>

<h3>Contatti</h3>

<p><strong>Email:</strong> {{ $associato->email }}</p>

<p><strong>Cellulare:</strong> {{ $associato->cellulare }}</p>

<hr>

<h3>Residenza</h3>

<p><strong>Indirizzo:</strong> {{ $associato->indirizzo_residenza }}</p>

<p><strong>CAP:</strong> {{ $associato->cap_residenza }}</p>

<p><strong>Comune:</strong> {{ $associato->comune_residenza }}</p>

<p><strong>Provincia:</strong> {{ $associato->provincia_residenza }}</p>

<p><strong>Nazione:</strong> {{ $associato->nazione_residenza }}</p>

<hr>

<h3>Tutore</h3>

<p><strong>Nome:</strong> {{ $associato->nome_tutore }}</p>

<p><strong>Cognome:</strong> {{ $associato->cognome_tutore }}</p>

<p><strong>Cellulare:</strong> {{ $associato->cellulare_tutore }}</p>

<hr>

<h3>Stato</h3>

<p><strong>Stato Associato:</strong> {{ $associato->stato_associato }}</p>

<hr>

<h3>Consensi Privacy</h3>

<p>
    Privacy accettata:
    <strong>

        {{
            optional($associato->consensoPrivacy)
            ->privacy_accettata
                ? '✅ SI' : '❌ NO'
        }}

    </strong>
</p>

<p>
    Foto e Video:
    <strong>

        {{
            optional($associato->consensoPrivacy)
            ->riprese_audio_video
                ? '✅ SI' : '❌ NO'
        }}

    </strong>
</p>

<p>
    Comunicazioni:
    <strong>

        {{
            optional($associato->consensoPrivacy)
            ->comunicazioni_commerciali
                ? '✅ SI' : '❌ NO'
        }}

    </strong>
</p>

<p>
    Data Consenso:
    <strong>

        {{
            optional($associato->consensoPrivacy)
            ->data_consenso
        }}

    </strong>
</p>

<p style="margin-top:20px;">

    <a
        href="/associati/{{ $associato->associato_id }}/edit"
        class="btn-action btn-edit">

        ✏️ Modifica

    </a>

    <a
        href="/associati"
        class="btn-action btn-edit">

        📋 Elenco Associati

    </a>

    <a
    href="/associati/{{ $associato->associato_id }}/modulo"
    class="btn-action btn-edit">

    📄 Genera Modulo Adesione

</a>
</p>

@endsection