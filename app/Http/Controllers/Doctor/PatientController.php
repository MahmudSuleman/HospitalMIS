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
        $patients = CheckIn::with('patient')->with('diagnose')->where('user_id', $user_id)->where('is_checked_out', 0)->get();
        return view('doctor.patients.index', compact('patients'));
    }

}

