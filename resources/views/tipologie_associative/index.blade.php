@extends('layouts.app')

@section('content')

<h1>Tipologie Associative</h1>

<table>

    <tr>
        <th>Codice</th>
        <th>Descrizione</th>
        <th style="text-align:right;">Quota</th>
        <th>Attiva</th>
        <th>Azioni</th>
    </tr>

    @foreach($tipologie as $tipologia)

    <tr>

        <td>{{ $tipologia->codice }}</td>

        <td>{{ $tipologia->descrizione }}</td>

        <td style="text-align:right;">
            @if($tipologia->quota_proposta == 0)

            Gratuito

            @else

            {{ number_format($tipologia->quota_proposta, 2, ',', '.') }} €

            @endif
        </td>


        <td>
            {{ $tipologia->attiva ? 'Si' : 'No' }}
        </td>

       <td>

    <a
        href="/tipologie-associative/{{ $tipologia->tipologia_associativa_id }}/edit"
        class="btn-action btn-edit">

        ✏️ Modifica

    </a>

    <form
        action="/tipologie-associative/{{ $tipologia->tipologia_associativa_id }}"
        method="POST"
        style="display:inline;">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn-action btn-delete">

            🗑️ Disattiva

        </button>

    </form>

</td>

    </tr>

    @endforeach

</table>

@endsection