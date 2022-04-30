<?php

namespace App\Http\Controllers;

use App\Models\PanicHistory;
use App\Models\Setting;
use Illuminate\Http\Request;

class WearApiController extends Controller
{
    public function getSettings()
    {
        $settings=Setting::first()->get();
        return($settings);

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
}
