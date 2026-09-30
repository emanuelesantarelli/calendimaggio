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
            <a href="/associati/{{ $associato->associato_id }}/edit">
                Modifica
            </a>
        </td>
    </tr>
    @endforeach
</table>