<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImpostazioneGenerale extends Model
{
    protected $table = 'impostazioni_generali';

    protected $fillable = [
        'nome_associazione',
        'indirizzo',
        'cap',
        'citta',
        'provincia',
        'email',
        'pec',
        'telefono',
        'codice_fiscale',
        'partita_iva',

        'logo',
        'logo_path',

        'colore_primario',
        'colore_secondario'
    ];
}