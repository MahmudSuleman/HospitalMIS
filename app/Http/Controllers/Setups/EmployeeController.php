<?php

namespace App\Http\Controllers\Setups;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('setups.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('setups.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //validate user inputs
        $validated = $request->validate([
           'first_name' => ['required','min:4', 'max:20'],
           'last_name' => ['required','min:4', 'max:20'],
           'department_id' => ['required','numeric'],
           'date_of_birth' => ['required', 'date'],
           'employee_type_id' => ['required', 'numeric'],
        ]);

        Employee::create($validated);

        return redirect()-> route('employee.index')->with('success', 'Employee Added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Application|Factory|View|Response
     */
    public function edit(Employee $employee)
    {
        return view('setups.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => ['required','min:4', 'max:20'],
            'last_name' => ['required','min:4', 'max:20'],
            'department_id' => ['required','numeric'],
            'date_of_birth' => ['required', 'date'],
            'employee_type_id' => ['required', 'numeric'],
        ]);

        $data = Employee::where('id', $employee->id)->update($validated);
        return back()->with('success', 'Employee Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
