<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatoEstero extends Model
{
    protected $table = 'stati_esteri';

    protected $primaryKey = 'stato_estero_id';

    protected $fillable = [

        'nome_stato',

        'codice_catastale',

        'attivo'

    ];
}
