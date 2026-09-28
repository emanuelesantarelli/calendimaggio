<h1>Associati</h1>

<table border="1">
    <tr>
        <th>Numero</th>
        <th>Cognome</th>
        <th>Nome</th>
        <th>Email</th>
    </tr>

    @foreach($associati as $associato)
    <tr>
        <td>{{ $associato->numero_associato }}</td>
        <td>{{ $associato->cognome }}</td>
        <td>{{ $associato->nome }}</td>
        <td>{{ $associato->email }}</td>
    </tr>
    @endforeach
</table>