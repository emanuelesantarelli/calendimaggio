<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <style>

        body {
            font-family: DejaVu Sans;
            font-size: 12px;
        }

        h1 {
            text-align: center;
        }

        .section {
            margin-bottom: 15px;
        }

    </style>

</head>
<body>

    <h1>
        Magnifica Parte de Sotto
    </h1>

    <h2>
        Modulo di Adesione
    </h2>

    <div class="section">

        <strong>
            Numero Associato:
        </strong>

        {{ $associato->numero_associato }}

    </div>

    <div class="section">

        <strong>
            Cognome:
        </strong>

        {{ $associato->cognome }}

    </div>

    <div class="section">

        <strong>
            Nome:
        </strong>

        {{ $associato->nome }}

    </div>

    <div class="section">

        <strong>
            Codice Fiscale:
        </strong>

        {{ $associato->codice_fiscale }}

    </div>

</body>
</html>