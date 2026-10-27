<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipologiaAssociativa extends Model
{
    protected $table = 'tipologie_associative';

    protected $primaryKey = 'tipologia_associativa_id';

    protected $fillable = [
        'codice',
        'descrizione',
        'quota_proposta',
        'attiva',
    ];

    protected $casts = [
        'attiva' => 'boolean',
        'quota_proposta' => 'decimal:2',
    ];
}