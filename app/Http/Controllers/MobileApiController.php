<?php

namespace App\Http\Controllers;

use App\Models\PanicHistory;
use App\Models\Patient;
use App\Models\WellnessData;
use Illuminate\Http\Request;

class MobileApiController extends Controller
{
    public function getPatient(Patient $id)
    {
        return $id;
    }
    public function storePanicAttack(Request $request)
    {
        $panicAttack=new PanicHistory;
        try{
            $panicAttack->patient_id=$request->patient_id;
            $panicAttack->save();
            return('success');
        }
        catch(\Exception $e)
        {
           return($e);
        }



    }
    public function postWellnessData(Request $request)
    {
        $data=new WellnessData;
        try{
            $data->patient_id=$request->patient_id;
            $data->anxiety=$request->anxiety;
            $data->well_being=$request->well_being;
            $data->stress=$request->stress;
            $data->agitation=$request->agitation;
            $data->save();
            return('success');
        }
        catch(\Exception $e)
        {
            return($e);
        }
    }
}
