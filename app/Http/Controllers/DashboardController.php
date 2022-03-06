<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\WellnessData;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Patient $patient)
    {
        $wrecords=WellnessData::where('patient_id',$patient->id)->get();
        $wrecordNew=WellnessData::where('patient_id',$patient->id)->orderBy('created_at', 'desc')->first();
        return view('main.dashboard',['patient'=>$patient,'wrecords'=>$wrecords,'wrecordNew'=>$wrecordNew]);
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
}
