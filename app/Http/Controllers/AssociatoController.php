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
            'numero_associato' => rand(1000, 999999),
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'sesso' => 'M',
            'data_nascita' => '2000-01-01',
            'comune_nascita' => 'Perugia',
            'provincia_nascita' => 'PG',
            'nazione_nascita' => 'Italia',
            'codice_fiscale' => strtoupper(substr(md5(time()), 0, 16)),
            'email' => $request->email,
            'cellulare' => '0000000000',
            'stato_associato' => 'ATTIVO'
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
        'email' => $request->email
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