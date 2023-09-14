<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRegistrationRequest;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employee.index')->with('employees', $employees);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.employee_registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRegistrationRequest $request)
    {
        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->department = $request->input('department');
        $employee->gender = $request->input('gender');
        $employee->phone_number = $request->input('phone_number');

        if($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $profile_picture = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/profilePictures', $profile_picture);
            $employee->profile_picture = $profile_picture;
        }
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee added successfully!!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRegistrationRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->department = $request->input('department');
        $employee->gender = $request->input('gender');
        $employee->phone_number = $request->input('phone_number');

        if ($request->hasFile('profile_picture')) {
            if ($employee->profile_picture) {
                Storage::disk('public')->delete("/profilePictures/" . $employee->profile_picture);
            }
            $file = $request->file('profile_picture');
            $profile_picture = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->storeAs('public/profilePictures', $profile_picture);
            $employee->profile_picture = $profile_picture;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if ($employee->profile_picture) {
            Storage::disk('public')->delete("/profilePictures/" . $employee->profile_picture);
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
