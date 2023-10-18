<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function Index()
    { 
        $employees = Employee::all();
        return view('admin.employees.allemployees',compact('employees'));
    }
    public function AddEmployee()
    {
        return view('admin.employees.addemployee');
    }
    public function StoreEmployee(Request $request){
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'city' => 'required|string',
            'email' => 'string',
            'phone_number' => 'required|string',
            'cin' => 'required|string',
            'cnss' => 'string',
            'diplome' => 'required|string',
            'hire_date' => 'required|string',
            'post' => 'required|string',
            'calendrier' => 'required|string',
            'hourly_rate' => 'required'
            
        ]);

        // Create a new product instance and populate it with the validated data
        $employee = new Employee ($validatedData);
        
         $employee->save();

        // Redirect back to the product list with a success message
        return redirect()->route('allemployees')->with('message', 'Employee created successfully');
    }
    public function EditEmployee ($id){
        $employee = Employee::findOrFail($id);
        return view ("admin/employees/editemployee", compact('employee'));
    }

    public function DeleteEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('allemployees')->with('message', 'Your Employee has been deleted.');
    }
    public function UpdateEmployee(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'city' => 'required|string',
            'email' => 'string',
            'phone_number' => 'required|string',
            'cin' => 'required|string',
            'cnss' => 'string',
            'diplome' => 'required|string',
            'hire_date' => 'required|string',
            'post' => 'required|string',
            'calendrier' => 'required|string',
            'hourly_rate' => 'required'
        ]);
        // Find the product by ID
        $employee = Employee::findOrFail($id);

        // Update the product with the validated data, including the status
        $employee->update($validatedData);

        // Redirect back to the product list or a success page
        return redirect()->route('allemployees')->with('message', 'Employee updated successfully');
    }
    public function ShowEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employees.showemployee',compact('employee'));
    }
}

