<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeStoreRequest;
use Illuminate\Support\Facades\Lang;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees= Employee::latest()->paginate(10);
        return view('employees.index',compact('employees'));
    }

    public function create()
    {
        //pass company component in view
        $companies = Company::ForDropdown();
        return view('employees.create',compact('companies'));
    }

    public function store(EmployeeStoreRequest $request)
    {
        //validating this request from http/requests/EmployeeStoreRequest
         $data = $request->validated();
         Employee::create($data);
         return redirect()->route('employees.index')->with('success',Lang::get('app.employeeadded'));
    }

    public function edit(Employee $employee)
    {
        //pass company component in view
        $companies = Company::ForDropdown();
        return view('employees.edit',compact('employee','companies'));
    }

    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        //validating this request from http/requests/EmployeeStoreRequest
        $data = $request->validated();
        $employee->update($data);
        return redirect()->route('employees.index')->with('success',Lang::get('app.employeeupdated'));
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success',Lang::get('app.employeedeleted'));
    }
}
