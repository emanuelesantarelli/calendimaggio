@extends('layouts.app')

@section('content')

<h1>Tesseramenti</h1>

<p>

    <a href="/tesseramenti/create"
        class="btn-action btn-edit">

        🔄 Rinnovo Tesseramento

    </a>

</p>

<table>

    <tr>

        <th>Associato</th>

        <th>Tipologia</th>

        <th>Anno</th>

        <th style="text-align:right;">
            Quota
        </th>

        <th>Scadenza</th>

        <th>Azioni</th>

    </tr>

    @foreach($tesseramenti as $tesseramento)

    <tr>

        <td>
            {{ $tesseramento->associato->cognome }}
            {{ $tesseramento->associato->nome }}
        </td>

        <td>
            {{ $tesseramento->tipologiaAssociativa->descrizione }}
        </td>

        <td>
            {{ $tesseramento->anno }}
        </td>

        <td style="text-align:right;">

            {{ number_format($tesseramento->importo_quota, 2, ',', '.') }} €

        </td>

        <td>

            {{ date('d/m/Y', strtotime($tesseramento->data_scadenza)) }}

        </td>

        <td>

            <a
                href="/tesseramenti/{{ $tesseramento->tesseramento_id }}/edit"
                class="btn-action btn-edit">

                ✏️ Modifica

            </a>

        </td>

    </tr>

    @endforeach

</table>

@endsection