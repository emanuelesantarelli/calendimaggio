@extends('layouts.app')

@section('content')

<h1>
    Impostazioni Generali
</h1>

<form
    action="/impostazioni-generali"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <p>
        Nome Associazione<br>

        <input
            type="text"
            name="nome_associazione"
            value="{{ $impostazioni->nome_associazione }}">
    </p>

    <p>
        Indirizzo<br>

        <input
            type="text"
            name="indirizzo"
            value="{{ $impostazioni->indirizzo }}">
    </p>

    <p>
        CAP<br>

        <input
            type="text"
            name="cap"
            value="{{ $impostazioni->cap }}">
    </p>

    <p>
        Città<br>

        <input
            type="text"
            name="citta"
            value="{{ $impostazioni->citta }}">
    </p>

    <p>
        Provincia<br>

        <input
            type="text"
            name="provincia"
            value="{{ $impostazioni->provincia }}">
    </p>

    <p>
        Telefono<br>

        <input
            type="text"
            name="telefono"
            value="{{ $impostazioni->telefono }}">
    </p>

    <p>
        Email<br>

        <input
            type="text"
            name="email"
            value="{{ $impostazioni->email }}">
    </p>

    <p>
        PEC<br>

        <input
            type="text"
            name="pec"
            value="{{ $impostazioni->pec }}">
    </p>

    <p>
        Codice Fiscale<br>

        <input
            type="text"
            name="codice_fiscale"
            value="{{ $impostazioni->codice_fiscale }}">
    </p>

    <p>
        Partita IVA<br>

        <input
            type="text"
            name="partita_iva"
            value="{{ $impostazioni->partita_iva }}">
    </p>

    <br>

    <p>

    Logo Associazione

</p>

<div
    style="
        width:180px;
        height:120px;
        border:2px dashed #999;
        display:flex;
        align-items:center;
        justify-content:center;
        margin-bottom:10px;
        background:#f8f8f8;">

    @if($impostazioni->logo_path)

        <img
            src="{{ asset('storage/'.$impostazioni->logo_path) }}"
            style="
                max-width:100%;
                max-height:100%;">

    @else

        <strong>LOGO</strong>

    @endif

</div>

<input
    type="file"
    name="logo">

@if($impostazioni->logo_path)

    <p>

        <label>

            <input
                type="checkbox"
                name="rimuovi_logo"
                value="1">

            Rimuovi logo

        </label>

    </p>

@endif

    </p>
    
    <button
        type="submit"
        class="btn-action btn-edit">

        💾 Salva

    </button>

</form>

@endsection