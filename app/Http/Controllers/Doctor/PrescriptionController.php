<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();

        return back()->with('success', 'Prescription Data Deleted Successfully');
    }
}
