@extends('layouts.app')

@section('content')

<h1>Associati</h1>

<p>
    <a href="/associati/create">
        Nuovo Associato
    </a>
</p>

<table border="1">
    <tr>
        <th>Numero</th>
        <th>Cognome</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Azioni</th>
    </tr>

    @foreach($associati as $associato)
    <tr>
        <td>{{ $associato->numero_associato }}</td>
        <td>{{ $associato->cognome }}</td>
        <td>{{ $associato->nome }}</td>
        <td>{{ $associato->email }}</td>
        <td>
       <td>

    <a href="/associati/{{ $associato->associato_id }}/edit">
        Modifica
    </a>
    <form
        action="/associati/{{ $associato->associato_id }}"
        method="POST"
        style="display:inline;">
    |
    <form action="/associati/{{ $associato->associato_id }}"
           method="POST"
           style="display:inline;">

        @csrf
        @method('DELETE')

        <button type="submit">
            Elimina
        </button>

    </form>

</td>
    </tr>
    @endforeach
</table>
@endsection