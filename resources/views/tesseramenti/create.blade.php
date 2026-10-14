@extends('layouts.app')

@section('content')

<h1>Rinnovo Tesseramento</h1>

<form action="/tesseramenti"
       method="POST">

    @csrf

    <p>

        Associato<br>

        <select name="associato_id" required>

            <option value="">
                -- Seleziona Associato --
            </option>

            @foreach($associati as $associato)

            <option value="{{ $associato->associato_id }}">

                {{ $associato->cognome }}
                {{ $associato->nome }}

            </option>

            @endforeach

        </select>

    </p>

    <p>

        Tipologia Associativa<br>

        <select
            name="tipologia_associativa_id"
             id="tipologia_associativa_id">

            <option value="">
                -- Seleziona Tipologia --
            </option>

            @foreach($tipologie as $tipologia)

            <option
                value="{{ $tipologia->tipologia_associativa_id }}"
                data-quota="{{ $tipologia->quota_proposta }}">

                {{ $tipologia->descrizione }}

            </option>

            @endforeach

        </select>

    </p>

    <p>

        Anno<br>

        <input
            type="number"
            name="anno"
            value="{{ date('Y') }}">

    </p>

    <p>

        Importo Quota (€)<br>

        <input
            type="number"
            step="0.01"
            name="importo_quota"
            id="importo_quota"
            readonly>

    </p>

    <p>

        Metodo Pagamento<br>

        <select name="metodo_pagamento">

            <option value="Contanti">
                Contanti
            </option>

            <option value="Bonifico">
                Bonifico
            </option>

            <option value="POS">
                POS
            </option>

        </select>

    </p>

    <p>

        Data Pagamento<br>

        <input
            type="date"
            name="data_pagamento"
            value="{{ date('Y-m-d') }}">

    </p>

    <p>

        Note<br>

        <textarea
            name="note"
            rows="4"
            cols="50"></textarea>

    </p>

    <button
        type="submit"
        class="btn-action btn-edit">

        ➕ Salva Tesseramento

    </button>

</form>

<p style="margin-top:20px;">

    <a href="/tesseramenti">

        ← Torna alla lista

    </a>

</p>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const tipologia =
        document.getElementById('tipologia_associativa_id');

    const quota =
        document.getElementById('importo_quota');

    tipologia.addEventListener('change', function () {

        const selezionata =
            this.options[this.selectedIndex];

        quota.value =
            selezionata.dataset.quota || '';

    });

});

</script>
@endsection