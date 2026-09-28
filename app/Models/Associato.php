<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associato extends Model
{
    protected $table = 'associati';

    protected $primaryKey = 'associato_id';

    protected $fillable = [
    'numero_associato',
    'nome',
    'cognome',
    'sesso',
    'data_nascita',
    'comune_nascita',
    'provincia_nascita',
    'nazione_nascita',
    'codice_fiscale',
    'email',
    'cellulare',
    'stato_associato'
];
}