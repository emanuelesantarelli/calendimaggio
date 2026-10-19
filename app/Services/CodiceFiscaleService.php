<?php

namespace App\Services;

class CodiceFiscaleService
{
    public static function genera(
        string $cognome,
        string $nome,
        string $sesso,
        string $dataNascita,
        string $codiceCatastale
    ): string {

        $cf =
            self::codiceCognome($cognome) .
            self::codiceNome($nome) .
            self::codiceAnno($dataNascita) .
            self::codiceMese($dataNascita) .
            self::codiceGiorno($dataNascita, $sesso) .
            strtoupper($codiceCatastale);

        return $cf . self::carattereControllo($cf);
    }

    private static function codiceCognome(string $cognome): string
    {
        return self::treLettere($cognome, false);
    }

    private static function codiceNome(string $nome): string
    {
        $nome = strtoupper($nome);

        $consonanti = preg_replace(
            '/[AEIOU]/',
            '',
            preg_replace('/[^A-Z]/', '', $nome)
        );

        if (strlen($consonanti) >= 4) {

            return
                $consonanti[0] .
                $consonanti[2] .
                $consonanti[3];
        }

        return self::treLettere($nome, false);
    }

    private static function treLettere(
        string $testo,
        bool $nome = false
    ): string {

        $testo = strtoupper($testo);

        $soloLettere =
            preg_replace('/[^A-Z]/', '', $testo);

        $consonanti =
            preg_replace('/[AEIOU]/', '', $soloLettere);

        $vocali =
            preg_replace('/[^AEIOU]/', '', $soloLettere);

        $risultato =
            $consonanti .
            $vocali .
            'XXX';

        return substr($risultato, 0, 3);
    }

    private static function codiceAnno(
        string $data
    ): string {

        return substr($data, 2, 2);
    }

    private static function codiceMese(
        string $data
    ): string {

        $mese = (int) substr($data, 5, 2);

        $mesi = [
            1  => 'A',
            2  => 'B',
            3  => 'C',
            4  => 'D',
            5  => 'E',
            6  => 'H',
            7  => 'L',
            8  => 'M',
            9  => 'P',
            10 => 'R',
            11 => 'S',
            12 => 'T',
        ];

        return $mesi[$mese];
    }

    private static function codiceGiorno(
        string $data,
        string $sesso
    ): string {

        $giorno =
            (int) substr($data, 8, 2);

        if (
            strtoupper($sesso) === 'F'
        ) {
            $giorno += 40;
        }

        return str_pad(
            $giorno,
            2,
            '0',
            STR_PAD_LEFT
        );
    }

    private static function carattereControllo(
        string $cf
    ): string {

        $pari = [
            '0'=>0,'1'=>1,'2'=>2,'3'=>3,'4'=>4,
            '5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,
            'A'=>0,'B'=>1,'C'=>2,'D'=>3,'E'=>4,
            'F'=>5,'G'=>6,'H'=>7,'I'=>8,'J'=>9,
            'K'=>10,'L'=>11,'M'=>12,'N'=>13,'O'=>14,
            'P'=>15,'Q'=>16,'R'=>17,'S'=>18,'T'=>19,
            'U'=>20,'V'=>21,'W'=>22,'X'=>23,'Y'=>24,'Z'=>25
        ];

        $dispari = [
            '0'=>1,'1'=>0,'2'=>5,'3'=>7,'4'=>9,
            '5'=>13,'6'=>15,'7'=>17,'8'=>19,'9'=>21,
            'A'=>1,'B'=>0,'C'=>5,'D'=>7,'E'=>9,
            'F'=>13,'G'=>15,'H'=>17,'I'=>19,'J'=>21,
            'K'=>2,'L'=>4,'M'=>18,'N'=>20,'O'=>11,
            'P'=>3,'Q'=>6,'R'=>8,'S'=>12,'T'=>14,
            'U'=>16,'V'=>10,'W'=>22,'X'=>25,'Y'=>24,'Z'=>23
        ];

        $somma = 0;

        for ($i = 0; $i < 15; $i++) {

            $carattere = $cf[$i];

            if (($i + 1) % 2 === 0) {
                $somma += $pari[$carattere];
            } else {
                $somma += $dispari[$carattere];
            }
        }

        return chr(($somma % 26) + 65);
    }
}