<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatiEsteriSeeder extends Seeder
{
    public function run(): void
    {
        $file = storage_path(
            'import/stati_esteri.csv'
        );

        if (!file_exists($file)) {

            throw new \Exception(
                'File stati_esteri.csv non trovato.'
            );

        }

        $handle = fopen($file, 'r');

        $header = fgetcsv($handle, 0, ';');

        while (
            ($row = fgetcsv(
                $handle,
                0,
                ';'
            )) !== false
        ) {

            $record =
                array_combine(
                    $header,
                    $row
                );

            DB::table(
                'stati_esteri'
            )->insert([

                'nome_stato' =>
                    trim(
                        $record['DENOMINAZIONE']
                    ),

                'codice_catastale' =>
                    trim(
                        $record['CODAT']
                    ),

                'attivo' => true,

                'created_at' => now(),

                'updated_at' => now(),

            ]);
        }

        fclose($handle);
    }
}