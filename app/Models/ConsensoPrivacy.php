<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsensoPrivacy extends Model
{
    protected $table = 'consensi_privacy';

    protected $primaryKey = 'consenso_privacy_id';

    protected $fillable = [

        'associato_id',

        'privacy_accettata',

        'riprese_audio_video',

        'comunicazioni_commerciali',

        'data_consenso'

    ];
    public $incrementing = true;

    protected $keyType = 'int';
}