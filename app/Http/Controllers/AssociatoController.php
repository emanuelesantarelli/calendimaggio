<?php

namespace App\Http\Controllers;

use App\Models\Associato;
use Illuminate\Http\Request;

class AssociatoController extends Controller
{
    public function index()
    {
        $associati = Associato::orderBy('cognome')
            ->orderBy('nome')
            ->get();

        return view('associati.index', compact('associati'));
    }

    public function create()
    {
        return view('associati.create');
    }

    public function store(Request $request)
{
    Associato::create([

        'numero_associato' => (Associato::max('numero_associato') ?? 0) + 1,

        'nome' => $request->nome,
        'cognome' => $request->cognome,

        'sesso' => $request->sesso,

        'data_nascita' => $request->data_nascita,

        'comune_nascita' => $request->comune_nascita,
        'provincia_nascita' => $request->provincia_nascita,
        'nazione_nascita' => 'Italia',

       'codice_fiscale' => $request->codice_fiscale,

        'email' => $request->email,

        'cellulare' => $request->cellulare,

        'stato_associato' => $request->stato_associato

    ]);

    return redirect('/associati');
}

    public function edit($id)
    {
        $associato = Associato::findOrFail($id);

        return view('associati.edit', compact('associato'));
    }

    public function update(Request $request, $id)
    {
        $associato = Associato::findOrFail($id);

        $associato->update([
    'nome' => $request->nome,
    'cognome' => $request->cognome,
    'sesso' => $request->sesso,
    'data_nascita' => $request->data_nascita,
    'comune_nascita' => $request->comune_nascita,
    'provincia_nascita' => $request->provincia_nascita,
    'email' => $request->email,
    'cellulare' => $request->cellulare,
    'stato_associato' => $request->stato_associato
]);

        return redirect('/associati');
    }

    public function destroy($id)
    {
        $associato = Associato::findOrFail($id);

        $associato->delete();

        return redirect('/associati');
    }
}