<?php

namespace App\Http\Controllers;

use App\Models\ImpostazioneGenerale;
use Illuminate\Http\Request;

class ImpostazioneGeneraleController extends Controller
{
    public function edit()
    {
        $impostazioni =
            ImpostazioneGenerale::first();

        return view(
            'impostazioni_generali.edit',
            compact('impostazioni')
        );
    }

    public function update(Request $request)
    {
        $impostazioni =
            ImpostazioneGenerale::first();

        $logoPath =
    $impostazioni->logo_path;

if ($request->hasFile('logo')) {

    $logoPath =
        $request
            ->file('logo')
            ->store(
                'loghi',
                'public'
            );
}

if ($request->rimuovi_logo) {

    $logoPath = null;

}
elseif ($request->hasFile('logo')) {

    $logoPath =
        $request
            ->file('logo')
            ->store(
                'loghi',
                'public'
            );
}

        $impostazioni->update([
            'nome_associazione' =>
                $request->nome_associazione,

            'indirizzo' =>
                $request->indirizzo,

            'cap' =>
                $request->cap,

            'citta' =>
                $request->citta,

            'provincia' =>
                $request->provincia,

            'telefono' =>
                $request->telefono,

            'email' =>
                $request->email,

            'pec' =>
                $request->pec,

            'codice_fiscale' =>
                $request->codice_fiscale,

            'partita_iva' =>
                $request->partita_iva,

            'logo_path' =>
                $logoPath,

            ]);

        return redirect(
            '/impostazioni-generali'
        );
        
    }

    public function layout()
{
    $impostazioni =
        ImpostazioneGenerale::first();

    return view(
        'impostazioni_generali.layout',
        compact('impostazioni')
    );
}

public function salvaLayout(Request $request)
{
    $impostazioni =
        ImpostazioneGenerale::first();

    $impostazioni->update([

        'colore_primario' =>
            $request->colore_primario,

        'colore_secondario' =>
            $request->colore_secondario,

    ]);

    return redirect(
        '/impostazioni-layout'
    );
}
}