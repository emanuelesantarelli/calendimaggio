@extends('layouts.app')

@section('content')

<h1>
    Layout
</h1>

<form
    action="/impostazioni-layout"
    method="POST">

    @csrf

    <p>

        Colore Primario

        <br>

        <input
            type="color"
            name="colore_primario"
            value="{{
                $impostazioni->colore_primario
                ?? '#B10000'
            }}">

    </p>

    <p>

        Colore Secondario

        <br>

        <input
            type="color"
            name="colore_secondario"
            value="{{
                $impostazioni->colore_secondario
                ?? '#7A0000'
            }}">

    </p>

    <button
        type="submit"
        class="btn-action btn-edit">

        💾 Salva Layout

    </button>

</form>

@endsection