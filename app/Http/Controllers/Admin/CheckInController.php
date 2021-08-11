<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CheckInController extends Controller
{
    public function index(){
        $checkIns = CheckIn::with('patient')->with('user')->get();
        return view('setups.checkins.index',compact('checkIns'));
    }

    public function history(){
        $checkIns = CheckIn::with('patient')->with('user')
            ->where('is_checked_out', '=', 1)->get();
        return view('setups.checkins.history',compact('checkIns'));
    }



}
