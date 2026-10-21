<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ConsensoPrivacy;

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
        'indirizzo_residenza',
        'cap_residenza',
        'comune_residenza',
        'provincia_residenza',
        'nazione_residenza',
        'email',
        'cellulare',
        'stato_associato',
        'nome_tutore',
        'cognome_tutore',
        'cellulare_tutore',
    ];

    public function consensoPrivacy()
    {
        return $this->hasOne(
            ConsensoPrivacy::class,
            'associato_id',
            'associato_id'
        );
    }
}