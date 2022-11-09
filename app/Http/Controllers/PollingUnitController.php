<?php

namespace App\Http\Controllers;

use App\Models\Results;
use App\Models\PollingUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        ->get();
        // dd($polling_unit);
        return response()->json($polling_unit);
    }

     public function ResultsAjax($polling){
     $polling_results = DB::table('announced_pu_results')->where('announced_pu_results.polling_unit_uniqueid',$polling)
      ->select(DB::raw("SUM(announced_pu_results.party_score) as count"))
	    ->get();
        // dd($polling_results);
        return response()->json($polling_results);
    }

    public function newresults(){
        $pol_name = DB::table('polling_unit')->orderBy('polling_unit_id', 'DESC')->get();
        $parties = DB::table('party')->orderBy('partyid', 'DESC')->get();
        return view('new_results', compact('pol_name', 'parties'));
    }

    public function storeresults(Request $request){
        $request->validate([
            'pol' =>'required',
            'party'=>'required',
            'result' =>'required',
        ],[
            'pol.required' =>'Kindly select a polling unit',
            'party.required' =>'Kindly select a party',
            'result.required' =>'Enter a result for this party',
        ]);
        Results::insert([
            'polling_unit' => $request->pol,
            'party' => $request->party,
            'result' => $request->result,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
			'message' => 'Result Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    }
}
