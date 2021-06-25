<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    function users(){
        $users = User::all();
        return view('setups.users',compact('users'));
    }

    public function doctor_per_department($department){
        $doctors = User::where('role_id', 2)->get();

    }
}
