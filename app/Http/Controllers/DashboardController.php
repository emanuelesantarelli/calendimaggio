<?php

namespace App\Http\Controllers;

use App\Models\Associato;

class DashboardController extends Controller
{
    public function index()
    {
        $totaleAssociati = Associato::count();

        $meseCorrente = date('m');

        $compleanni = Associato::whereMonth(
            'data_nascita',
            $meseCorrente
        )
        ->orderBy('data_nascita')
        ->get();

        return view(
            'dashboard.index',
            compact(
                'totaleAssociati',
                'compleanni'
            )
        );
    }
}