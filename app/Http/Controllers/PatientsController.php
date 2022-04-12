<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index()
    {

        $patients=Patient::all();
        return view('main.patient-list',['patients'=>$patients]);
    }
    public function store(Request $request)
    {
        try {
            Patient::create([
                'name' => $request->name,
                'dob' => $request->dob,
                'sex' => $request->sex,
                'id_no' => $request->id
            ]);
            return redirect()->route('patients');
        }
        catch (\Exception $e){
            dd($e);
        }
    }
}
