@extends('layouts.app')

@section('content')

<h1>Rinnovo Tesseramento</h1>

@if(session('errore'))

    <div
        style="
        background:#f8d7da;
        color:#842029;
        padding:10px;
        border-radius:5px;
        margin-bottom:20px;">

        {{ session('errore') }}

    </div>

@endif

<form action="/tesseramenti"
       method="POST">

    @csrf

    <p>

    Associato<br>

    <input
        type="text"
        id="ricerca_associato"
        placeholder="Cerca per nome, cognome o numero associato"
        autocomplete="off">

</p>

<div
    id="risultati_associato"
    style="
        background:white;
        border:1px solid #ccc;
        display:none;
        max-height:200px;
        overflow-y:auto;">
</div>

<input
    type="hidden"
    name="associato_id"
    id="associato_id">

    <p>

        Tipologia Associativa<br>

        <select
            name="tipologia_associativa_id"
             id="tipologia_associativa_id"
             readonly>

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
const ricerca =
    document.getElementById(
        'ricerca_associato'
    );

const risultati =
    document.getElementById(
        'risultati_associato'
    );

ricerca.addEventListener(
    'keyup',
    function () {

        if (this.value.length < 2) {

            risultati.style.display =
                'none';

            return;
        }

        fetch(
            '/api/associati/search?q='
            + encodeURIComponent(
                this.value
            )
        )
        .then(r => r.json())
        .then(data => {

            risultati.innerHTML = '';

            data.forEach(a => {

                const div =
                    document.createElement(
                        'div'
                    );

                div.style.padding =
                    '8px';

                div.style.cursor =
                    'pointer';
                
                div.style.transition =
                    'background-color 0.15s';
                    
                div.addEventListener('mouseover', function () {
                this.style.backgroundColor = '#EFE7D6';
    
                });

                div.addEventListener('mouseout', function () {
                this.style.backgroundColor = 'white';
                });

                div.innerHTML =
                    a.numero_associato
                    + ' - '
                    + a.cognome
                    + ' '
                    + a.nome;

                div.addEventListener(
                    'click',
                    function () {

                        ricerca.value =
                            this.innerText;

                        document
                            .getElementById(
                                'associato_id'
                            )
                            .value =
                            a.associato_id;

                        risultati.style.display =
                            'none';

                        document
                            .getElementById(
                                'associato_id'
                            )
                            .dispatchEvent(
                                new Event(
                                    'change'
                                )
                            );
                    }
                );

                risultati.appendChild(
                    div
                );
            });

            risultati.style.display =
                'block';

        });

    }
);

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const associato =
            document.getElementById(
                'associato_id'
            );

        const tipologia =
            document.getElementById(
                'tipologia_associativa_id'
            );

        const quota =
            document.getElementById(
                'importo_quota'
            );

        associato.addEventListener(
            'change',
            function () {

                if (!this.value) {
                    return;
                }

                fetch(
                    '/api/associati/'
                    + this.value
                    + '/tipologia'
                )
                .then(
                    response =>
                    response.json()
                )
                .then(
                    data => {

                        tipologia.value =
                            data.tipologia_id;

                        quota.value =
                            data.quota;

                    }
                );

            }
        );

    }
);

document.addEventListener('click', function(e) {

    if (
        !ricerca.contains(e.target)
        &&
        !risultati.contains(e.target)
    ) {
        risultati.style.display = 'none';
    }

});
</script>
@endsection