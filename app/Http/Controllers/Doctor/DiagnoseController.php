<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use App\Models\Diagnose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnoseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create(CheckIn $patient)
    {
        return view('doctor.patients.diagnose', compact('patient'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,CheckIn $patient)
    {

        try {
            DB::transaction(function () use ($request, $patient) {
                $dig = \App\Models\Diagnose::create([
                    'check_in_id' => $patient->id,
                    'observations' => $request->get('observations'),
                    'symptoms' => $request->get('symptoms'),
                ]);

                $meds = $request->get('medicine');
                $dosages = $request->get('dosage');
                $count = count($meds);

                for ($i = 0; $i < $count; $i++) {
                    $dig->prescription()->create([
                        'medicine_id' => $meds[$i],
                        'dosage' => $dosages[$i]
                    ]);
                }

            });

        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
        return response(['success' => true], 200);

    }

    public function show(CheckIn $patient)
    {
        return View('doctor.patients.diagnose.show', compact('patient'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Diagnose $diagnose)
    {
        $diagnose->delete();
        return redirect()->route('doctor.patient')->with('success', 'Diagnose data deleted');
    }
}
