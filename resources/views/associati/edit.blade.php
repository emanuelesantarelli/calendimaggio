<h1>Modifica Associato</h1>

<form action="/associati/{{ $associato->associato_id }}" method="POST">

    @csrf
    @method('PUT')

    <p>
        Cognome<br>
        <input
            type="text"
            name="cognome"
            value="{{ $associato->cognome }}">
    </p>

    <p>
        Nome<br>
        <input
            type="text"
            name="nome"
            value="{{ $associato->nome }}">
    </p>

    <p>
        Email<br>
        <input
            type="email"
            name="email"
            value="{{ $associato->email }}">
    </p>

    <button type="submit">
        Salva Modifiche
    </button>

</form>

<p>
    <a href="/associati">
        Torna alla lista
    </a>
</p>