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
<<<<<<< HEAD
        <td>
=======
       <td>
>>>>>>> 07caf04 (CRUD associati completato e corretto)

    <a href="/associati/{{ $associato->associato_id }}/edit">
        Modifica
    </a>

<<<<<<< HEAD
    <form
        action="/associati/{{ $associato->associato_id }}"
        method="POST"
        style="display:inline;">
=======
    |

    <form action="/associati/{{ $associato->associato_id }}"
           method="POST"
           style="display:inline;">
>>>>>>> 07caf04 (CRUD associati completato e corretto)

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