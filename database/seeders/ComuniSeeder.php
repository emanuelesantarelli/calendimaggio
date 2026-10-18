<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComuniSeeder extends Seeder
{
    public function run(): void
    {
        $file = storage_path('import/ANPR_archivio_comuni.csv');

        if (!file_exists($file)) {
            throw new \Exception(
                "File ANPR_archivio_comuni.csv non trovato."
            );
        }

        $handle = fopen($file, 'r');

        // intestazione
        $header = fgetcsv($handle);

        while (($row = fgetcsv($handle)) !== false) {

            $record = array_combine($header, $row);

            // Importa solo comuni attivi
            if (($record['STATO'] ?? '') !== 'A') {
                continue;
            }

            DB::table('comuni')->insert([

                'nome_comune' =>
                    trim($record['DENOMINAZIONE_IT']),

                'provincia' =>
                    trim($record['SIGLAPROVINCIA']),

                'codice_catastale' =>
                    trim($record['CODCATASTALE']),

                'nazione' =>
                    'Italia',

                'attivo' =>
                    true,

                'created_at' =>
                    now(),

                'updated_at' =>
                    now(),

            ]);
        }

        fclose($handle);
    }
}