<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PatientController extends Controller
{

    public function index()
    {
        $user_id = Auth::id();
//        patients for currently logged in doctor.
        $patients = CheckIn::where('user_id', $user_id)->where('is_checked_out', 0)->get();
        return view('doctor.patients.index', compact('patients'));
    }

    public function diagnose(CheckIn $patient)
    {
        return view('doctor.patients.diagnose', compact('patient'));
    }

    public function diagnose_add(Request $request, CheckIn $patient)
    {

        try {
            DB::transaction(function () use ($request, $patient){
                $dig = \App\Models\Diagnose::create([
                    'check_in_id' => $patient->id,
                    'observations' => $request->get('observations'),
                    'symptoms' => $request->get('symptoms'),
                ]);

                $meds = $request->get('medicine');
                $dosages = $request->get('dosage');
                $count = count($meds);

                for ($i = 0 ; $i < $count; $i++){
                    $dig->prescription()->create([
                        'medicine_id' => $meds[$i],
                        'dosage' => $dosages[$i]
                    ]);
                }

            });

        }catch(\Exception $e){
            return ['success' => false, 'message'=>$e->getMessage()];
        }
        return response(['success'=> true], 200);

    }
}

