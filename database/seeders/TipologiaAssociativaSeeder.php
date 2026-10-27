<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipologiaAssociativa;

class TipologiaAssociativaSeeder extends Seeder
{
    public function run(): void
    {
        TipologiaAssociativa::insert([
            [
                'codice' => 'ORD',
                'descrizione' => 'Socio Ordinario',
                'quota_proposta' => 20.00,
                'attiva' => true,
            ],
            [
                'codice' => 'SOST',
                'descrizione' => 'Socio Sostenitore',
                'quota_proposta' => 50.00,
                'attiva' => true,
            ],
            [
                'codice' => 'BEN',
                'descrizione' => 'Socio Benemerito',
                'quota_proposta' => 0.00,
                'attiva' => true,
            ],
        ]);
    }
}