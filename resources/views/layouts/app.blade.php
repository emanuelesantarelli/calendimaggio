<!DOCTYPE html>

<html lang="it">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Gestionale Magnifica Parte de Sotto</title>

    <style>

        body {
            margin: 0;
            font-family: Segoe UI, Arial, sans-serif;
            background-color: #F5F1E8;
            color: #2F2A24;
        }

        .header {
            background-color: #B10000;
            color: white;
            padding: 15px 25px;
        }

        .header-title {
            font-size: 28px;
            font-weight: bold;
        }

        .header-subtitle {
            font-size: 14px;
        }

        .top-menu {
            background-color: #7A0000;
            padding: 10px;
        }

        .top-menu a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        .top-menu a:hover {
            color: #C8A24A;
        }

        .page {
            display: flex;
            min-height: calc(100vh - 120px);
        }

        .sidebar {
            width: 220px;
            background-color: #EFE7D6;
            padding: 20px;
            border-right: 1px solid #D6C6A8;
        }

        .sidebar a {
            display: block;
            padding: 8px 0;
            text-decoration: none;
            color: #2F2A24;
        }

        .content {
            flex: 1;
            padding: 25px;
        }

    </style>

</head>

<body>

    <div class="header">

        <div class="header-title">
            Magnifica Parte de Sotto
        </div>

        <div class="header-subtitle">
            Gestionale Calendimaggio di Assisi
        </div>

    </div>

    <div class="top-menu">

        <a href="#">
            Dashboard
        </a>

        <a href="/associati">
            Associati
        </a>

        <a href="#">
            Tipologie Associative
        </a>

        <a href="#">
            Tesseramenti
        </a>

        <a href="#">
            Eventi
        </a>

        <a href="#">
            Documenti
        </a>

        <a href="#">
            Magazzino
        </a>

        <a href="#">
            Amministrazione
        </a>

    </div>

    <div class="page">

        <div class="sidebar">

            <h3>Associati</h3>

            <a href="/associati/create">
                ➕ Nuovo Associato
            </a>

            <a href="/associati">
                📋 Elenco Associati
            </a>

            <a href="#">
                🎂 Compleanni
            </a>

            <a href="#">
                📊 Statistiche
            </a>

        </div>

        <div class="content">

            @yield('content')

        </div>

    </div>

</body>

</html>