<?php

namespace App\Http\Controllers;

use App\Models\PollingUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollingUnitController extends Controller
{
    public function pollingresults(){
        // using query builder

        $polling_results = DB::table('announced_pu_results')
            ->join('polling_unit', 'announced_pu_results.polling_unit_uniqueid', '=', 'polling_unit.uniqueid')
            ->select('polling_unit.polling_unit_name', 'announced_pu_results.party_abbreviation', 'announced_pu_results.party_score')
            ->orderBy('polling_unit_name','ASC')->get();

            // dump and die to see if the query entered the page
            // dd($polling_results);
        return view('polling_results', compact('polling_results'));
    }

    public function lgaresults(){
        $lgas = DB::table('lga')->orderBy('lga_name', 'ASC')->get();
        // dd($lgas);
        return view('lga_results', compact('lgas'));
    }

    public function pollingAjax($lga){
        $polling_unit = DB::table('polling_unit')->where('polling_unit.lga_id', $lga)
        ->join('lga', 'polling_unit.lga_id', '=', 'lga.lga_id')->get();

        return json_encode($polling_unit);
    }
}
