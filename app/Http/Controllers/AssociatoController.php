<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Associato;
use App\Models\Comune;
use App\Models\StatoEstero;
use Illuminate\Http\Request;
use App\Models\ConsensoPrivacy;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\File;


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
    $comuni = Comune::orderBy('nome_comune')
        ->get();

    $statiEsteri = StatoEstero::orderBy('nome_stato')
        ->get();

    return view(
        'associati.create',
        compact(
            'comuni',
            'statiEsteri'
        )
    );
    }

    public function store(Request $request)
{
    $associato = Associato::create([

        'numero_associato' => (Associato::max('numero_associato') ?? 0) + 1,

        'nome' => $request->nome,
        'cognome' => $request->cognome,

        'sesso' => $request->sesso,

        'data_nascita' => $request->data_nascita,

        'comune_nascita' => $request->comune_nascita,
        'provincia_nascita' => $request->provincia_nascita,
        'nazione_nascita' => $request->nazione_nascita,

        'codice_fiscale' => $request->codice_fiscale,

        'indirizzo_residenza' => $request->indirizzo_residenza,
        'cap_residenza' => $request->cap_residenza,
        'comune_residenza' => $request->comune_residenza,
        'provincia_residenza' => $request->provincia_residenza,
        'nazione_residenza' => $request->nazione_residenza,

        'email' => $request->email,

        'cellulare' => $request->cellulare,

        'stato_associato' => $request->stato_associato,

        'nome_tutore' => $request->nome_tutore,
        'cognome_tutore' => $request->cognome_tutore,
        'cellulare_tutore' => $request->cellulare_tutore,

    ]);
    
        \DB::table('consensi_privacy')->insert([
    'associato_id' => $associato->associato_id,

    'privacy_accettata' =>
        $request->has('privacy_accettata'),

    'riprese_audio_video' =>
        $request->has('riprese_audio_video'),

    'comunicazioni_commerciali' =>
        $request->has('comunicazioni_commerciali'),

    'data_consenso' =>
        $request->data_consenso,

    'created_at' => now(),
    'updated_at' => now()
    
    ]);

    return redirect('/associati');
}

    public function edit($id)
{
    $associato = Associato::with(
        'consensoPrivacy'
    )->findOrFail($id);

    $comuni = Comune::orderBy('nome_comune')
        ->get();

    $statiEsteri = StatoEstero::orderBy('nome_stato')
        ->get();

    return view(
        'associati.edit',
        compact(
            'associato',
            'comuni',
            'statiEsteri'
        )
    );
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
    'nazione_nascita' => $request->nazione_nascita,
    'indirizzo_residenza' => $request->indirizzo_residenza,
    'cap_residenza' => $request->cap_residenza,
    'comune_residenza' => $request->comune_residenza,
    'provincia_residenza' => $request->provincia_residenza,
    'nazione_residenza' => $request->nazione_residenza,
    'codice_fiscale' => $request->codice_fiscale,
    'email' => $request->email,
    'cellulare' => $request->cellulare,
    'stato_associato' => $request->stato_associato,
    'nome_tutore' => $request->nome_tutore,
    'cognome_tutore' => $request->cognome_tutore,
    'cellulare_tutore' => $request->cellulare_tutore,
]);
    ConsensoPrivacy::updateOrCreate(

    [
        'associato_id' => $associato->associato_id
    ],

    [
        'privacy_accettata' =>
            $request->has('privacy_accettata'),

        'riprese_audio_video' =>
            $request->has('riprese_audio_video'),

        'comunicazioni_commerciali' =>
            $request->has(
                'comunicazioni_commerciali'
            ),

        'data_consenso' =>
            $request->data_consenso

    ]);
        return redirect('/associati');
    }

        public function destroy($id)
    {
        $associato = Associato::findOrFail($id);

        $associato->delete();

        return redirect('/associati');
    }

public function show($id)
{
    $associato = Associato::with(
        'consensoPrivacy'
    )->findOrFail($id);

    return view(
        'associati.show',
        compact('associato')
    );
}
public function generaModulo($id)
{
    try {

        $associato = Associato::with(
            'consensoPrivacy'
        )->findOrFail($id);

        putenv('TMP=C:\temp_mpds');
        putenv('TEMP=C:\temp_mpds');

        $template = new TemplateProcessor(
            storage_path(
                'app/templates/Modulo_Adesione_MPDS.docx'
            )
        );

        $template->setValue(
            'NOME',
            $associato->nome
        );

        $template->setValue(
            'COGNOME',
            $associato->cognome
        );

        $template->setValue(
            'CODICE_FISCALE',
            $associato->codice_fiscale
        );

        $fileName =
            'Modulo_' .
            $associato->cognome .
            '_' .
            $associato->nome .
            '.docx';

        $outputPath =
            'C:\\temp_mpds\\' .
            $fileName;

        $template->saveAs(
            $outputPath
        );

        return response()->download(
            $outputPath
        );

    } catch (\Throwable $e) {

        return response()->json([
            'errore' => $e->getMessage()
        ]);

    }
}
}