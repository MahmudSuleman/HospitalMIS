<?php

namespace App\Http\Controllers\Setups;

use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('setups.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('setups.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|Factory|View|Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'date_of_birth' => ['required', 'date'],
            'gender_id' => ['required', 'numeric'],

        ]);

        $patient = Patient::create($request->all());
        $patients = Patient::all();

        return view('setups.patients.index', compact('patients'))->with('success', 'Patient with card no. {$patient->patient_id}');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Patient $patient
     * @return Application|Factory|View|Response
     */
    public function edit(Patient $patient)
    {
        return view('setups.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'date_of_birth' => ['required', 'date'],
            'gender_id' => ['required', 'numeric'],

        ]);

        Patient::find($id)->update($request->all());
        return redirect()->route('patient.index')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkin(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'patient_id' => ['required', 'numeric']
        ]);


        if($validator->fails()){
            return json_encode(['success'=> false, 'message' => 'Doctor field is required']);
        }

        $patient = \App\Models\CheckIn::where('patient_id', 1)
            ->where('is_checked_out', 0)
            ->get()
            ->all();
        if(!$patient){
            CheckIn::create($request->all());
            return json_encode(['success' => true]);
        }else{
            return json_encode(['success' => false, 'message' => 'Patient Assigned Already']);

        }


    }
}
