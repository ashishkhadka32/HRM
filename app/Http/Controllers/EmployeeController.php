<?php

namespace App\Http\Controllers;

use App\GenderEnum;
use App\Models\Role;
use App\Models\Employee;
use App\EmployeeTypeEnum;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $roles = Role::all();
        return view('employee.create', compact('departments', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|max:100|unique:employees,email',
            'phone_number' => 'required|string|max:20|unique:employees,phone_number',
            'dob' => 'required|date',
            'gender' => 'required|in:1,2,3',
            'address' => 'required|string|max:100',
            'emergency_contact_name' => 'nullable|string|max:50',
            'emergency_contact_number' => 'nullable|string|max:20',
            'joining_date' => 'required|date',
            'job_title' => 'required|string|max:100',
            'employee_type' => 'required|in:1,2,3,4,5',
            'offer_letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'department_id' => 'nullable|exists:departments,id',
            'role_id' => 'nullable|exists:roles,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        if ($request->hasFile('offer_letter')) {
            $validated['offer_letter'] = $request->file('offer_letter')->store('offer_letters', 'public');
        }

        // Convert gender and employee_type to enums
        $validated['gender'] = GenderEnum::from((int)$validated['gender']);
        $validated['employee_type'] = EmployeeTypeEnum::from((int)$validated['employee_type']);

        Employee::create($validated);

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
