<?php

namespace App\Http\Controllers;

use App\Models\PanicHistory;
use App\Models\Patient;
use App\Models\WellnessData;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index(Patient $patient)
    {
        $wrecords=WellnessData::where('patient_id',$patient->id)->get();
        $panicAttacks=PanicHistory::where('patient_id',$patient->id)->get();
        $wrecordNew=WellnessData::where('patient_id',$patient->id)->orderBy('created_at', 'desc')->first();
        return view('main.dashboard',['patient'=>$patient,'wrecords'=>$wrecords,'wrecordNew'=>$wrecordNew,'panicAttacks'=>$panicAttacks]);
    }

    public function storeWellnessData(Request $request)
    {
        try{
            WellnessData::create($request->all());
            return back();
        }
        catch(\Exception $e)
        {
            dd($e);
        }
    }

    public function storePanicAttack($id)
    {
        try{
            PanicHistory::create(['patient_id'=>$id]);
            return back();
        }
        catch(\Exception $e)
        {
            dd($e);
        }


    }

    public function printPDF(Patient $patient){
        $wrecords=WellnessData::where('patient_id',$patient->id)->get();
        $panicAttacks=PanicHistory::where('patient_id',$patient->id)->get();
        $wrecordNew=WellnessData::where('patient_id',$patient->id)->orderBy('created_at', 'desc')->first();
        $data=['patient'=>$patient,'wrecords'=>$wrecords,'wrecordNew'=>$wrecordNew,'panicAttacks'=>$panicAttacks];
        return view('main.printable-dashboard',$data);
        //return $pdf->download('statiostics.pdf');
    }
}
