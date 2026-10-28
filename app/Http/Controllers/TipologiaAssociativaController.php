<?php

namespace App\Http\Controllers;

use App\Models\TipologiaAssociativa;
use Illuminate\Http\Request;

class TipologiaAssociativaController extends Controller
{
    public function index()
{
    $tipologie = TipologiaAssociativa::orderBy('descrizione')
        ->get();

    return view(
        'tipologie_associative.index',
        compact('tipologie')
    );
}

    public function create()
    {
        return view('tipologie_associative.create');
    }

    public function store(Request $request)
    {
        TipologiaAssociativa::create([
            'codice' => $request->codice,
            'descrizione' => $request->descrizione,
            'quota_proposta' => $request->quota_proposta,
            'attiva' => $request->has('attiva')
        ]);

        return redirect('/tipologie-associative');
    }

    public function edit($id)
{
    $tipologia = TipologiaAssociativa::findOrFail($id);

    $utilizzata = $tipologia
        ->tesseramenti()
        ->exists();

    return view(
        'tipologie_associative.edit',
        compact(
            'tipologia',
            'utilizzata'
        )
    );
}

    public function update(Request $request, $id)
{
    $tipologia = TipologiaAssociativa::findOrFail($id);

    $utilizzata = $tipologia
        ->tesseramenti()
        ->exists();

    if ($utilizzata) {

        $tipologia->update([
            'descrizione' => $request->descrizione,
            'attiva' => $request->has('attiva')
        ]);

    } else {

        $tipologia->update([
            'codice' => $request->codice,
            'descrizione' => $request->descrizione,
            'quota_proposta' => $request->quota_proposta,
            'attiva' => $request->has('attiva')
        ]);

    }

    return redirect('/tipologie-associative');
}

    public function destroy($id)
    {
    $tipologia = TipologiaAssociativa::findOrFail($id);

    $inUso = $tipologia
        ->tesseramenti()
        ->exists();

    if ($inUso) {

        return back()->with(
            'errore',
            'La tipologia è utilizzata da uno o più tesseramenti.'
        );

    }

    $tipologia->update([
        'attiva' => false
    ]);

    return redirect('/tipologie-associative');
    }

}