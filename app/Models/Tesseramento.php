<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tesseramento extends Model
{
    protected $table = 'tesseramenti';

    protected $primaryKey = 'tesseramento_id';

    protected $fillable = [
        'associato_id',
        'tipologia_associativa_id',
        'documento_id',
        'operatore_id',
        'anno',
        'data_adesione',
        'data_scadenza',
        'importo_quota',
        'metodo_pagamento',
        'data_pagamento',
        'note'
    ];

    public function associato()
    {
        return $this->belongsTo(
            Associato::class,
            'associato_id',
            'associato_id'
        );
    }

    public function tipologiaAssociativa()
    {
        return $this->belongsTo(
            TipologiaAssociativa::class,
            'tipologia_associativa_id',
            'tipologia_associativa_id'
        );
    }
}