<?php

namespace App\Http\Controllers\Setups;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('setups.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return  view('setups.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'unique:departments']
            ]
        );

        $department = Department::create([
            'name' => $request->name
    ]);

        if($department){
            return redirect()->back()->with('success', 'Department Added Successfully');
        }
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
     * @param Department $department
     * @return Application|Factory|View|Response
     */
    public function edit(Department $department)
    {
        return view ('setups.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Department  $department)
    {
        $request->validate(
            [
                'name' => ['required', 'unique:departments']
            ]
        );

        $department = Department::where('id', $department->id)->update([
            'name' => $request->name
        ]);

        if($department){
            return redirect()->back()->with('success', 'Department Updated Successfully');
        }
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
}
