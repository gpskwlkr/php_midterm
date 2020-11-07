<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    public function index()
    {
        $emp = Employee::all();

        return view('employee_list')->with('employees', $emp);
    }

    public function editEmployeeEntry($employeeId)
    {
        $emp = Employee::findOrFail($employeeId);

        return view('edit')->with('employee', $emp);
    }

    public function updateEmployeeEntry(Request $request, $employeeId)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'surname' => 'required',
                'phone' => 'required',
                'position' => 'required'
            ]);
        } catch (ValidationException $e)
        {
            return redirect()->back()->withErrors($e->getMessage());
        }

        $emp = Employee::findOrFail($employeeId);

        $emp->name = $request->name;
        $emp->surname = $request->surname;
        $emp->phone = $request->phone;
        $emp->position = $request->position;
        $emp->is_hired = $request->is_hired;

        $emp->save();

        return redirect(route('employees.index'));
    }

    public function deleteEmployeeEntry($employeeId)
    {
        Employee::destroy($employeeId);

        return redirect(route('employees.index'));
    }
}
