<?php

namespace App\Http\Controllers;

use App\Models\Tesseramento;
use App\Models\Associato;
use App\Models\TipologiaAssociativa;
use Illuminate\Http\Request;

class TesseramentoController extends Controller
{
    public function index()
    {
        $tesseramenti = Tesseramento::with([
            'associato',
            'tipologiaAssociativa'
        ])
        ->orderByDesc('anno')
        ->get();

        return view(
            'tesseramenti.index',
            compact('tesseramenti')
        );
    }

    public function create()
    {
        $associati = Associato::orderBy('cognome')
            ->orderBy('nome')
            ->get();

        $tipologie = TipologiaAssociativa::where('attiva', true)
            ->orderBy('descrizione')
            ->get();

        return view(
            'tesseramenti.create',
            compact(
                'associati',
                'tipologie'
            )
        );
    }

    public function store(Request $request)
    {
        $esistente = Tesseramento::where(
            'associato_id',
            $request->associato_id
        )
        ->where(
            'anno',
            $request->anno
        )
        ->exists();

        if ($esistente) {
            return back()
                ->withInput()
                ->with(
                    'errore',
                    'Esiste già un tesseramento per questo associato nell\'anno selezionato.'
                );
    }
                
        Tesseramento::create([

            'associato_id' => $request->associato_id,

            'tipologia_associativa_id' =>
                $request->tipologia_associativa_id,

            'anno' => $request->anno,

            'data_adesione' => now(),

            'data_scadenza' =>
                $request->anno . '-12-31',

            'importo_quota' =>
                $request->importo_quota,

            'metodo_pagamento' =>
                $request->metodo_pagamento,

            'data_pagamento' =>
                $request->data_pagamento,

            'note' =>
                $request->note

        ]);

        return redirect('/tesseramenti');
    }

    public function edit($id)
    {
        $tesseramento = Tesseramento::findOrFail($id);

        $associati = Associato::orderBy('cognome')
            ->orderBy('nome')
            ->get();

        $tipologie = TipologiaAssociativa::orderBy('descrizione')
            ->get();

        return view(
            'tesseramenti.edit',
            compact(
                'tesseramento',
                'associati',
                'tipologie'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $tesseramento = Tesseramento::findOrFail($id);

        $tesseramento->update([

            'associato_id' =>
                $request->associato_id,

            'tipologia_associativa_id' =>
                $request->tipologia_associativa_id,

            'anno' =>
                $request->anno,

            'data_scadenza' =>
                $request->anno . '-12-31',

            'importo_quota' =>
                $request->importo_quota,

            'metodo_pagamento' =>
                $request->metodo_pagamento,

            'data_pagamento' =>
                $request->data_pagamento,

            'note' =>
                $request->note

        ]);

        return redirect('/tesseramenti');
    }

    public function destroy($id)
    {
        $tesseramento = Tesseramento::findOrFail($id);

        $tesseramento->delete();

        return redirect('/tesseramenti');
    }
}