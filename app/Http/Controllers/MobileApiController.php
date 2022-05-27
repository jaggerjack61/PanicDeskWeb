<?php

namespace App\Http\Controllers;

use App\Models\PanicHistory;
use App\Models\Patient;
use App\Models\Setting;
use App\Models\User;
use App\Models\WellnessData;
use Illuminate\Http\Request;

class MobileApiController extends Controller
{
    public function getPatient(Patient $id)
    {
        return $id;

		//return Patient::all();
    }
    public function postPanicAttack(Request $request)
    {
        $panicAttack=new PanicHistory;
        try{
            $panicAttack->patient_id=$request->patient_id;
            $panicAttack->save();
            return('success');
        }
        catch(\Exception $e)
        {
           return('failed');
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
            return('failed');
        }
    }

    public function postSettings(Request $request)
    {
        try {
            $settings = Setting::first();
            if ($settings) {
                $settings->update([
                    'url' => $request->url,
                    'patient_id' => $request->patient_id,
                    'message' => $request->message,
                    'phone_no' => $request->phone_no]);


            }
            else {
                $setting = new Setting();
                $setting->url = $request->url;
                $setting->patient_id = $request->patient_id;
                $setting->message = $request->message;
                $setting->phone_no = $request->phone_no;
                $setting->save();

            }
            return('success');
        }
        catch(\Exception $e)
        {
            return($e);
        }
    }

    public function getDays($patient){
        try {
            return (PanicHistory::where('patient_id', $patient)->latest()->first()->created_at->diffForHumans());
        }
        catch(\Exception $e){
            return($e->getMessage());
        }
    }
}
