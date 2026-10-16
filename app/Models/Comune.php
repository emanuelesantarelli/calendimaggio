<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comune extends Model
{
    protected $table = 'comuni';

    protected $primaryKey = 'comune_id';

    protected $fillable = [
        'nome_comune',
        'provincia',
        'cap',
        'codice_catastale',
        'attivo'
    ];
}