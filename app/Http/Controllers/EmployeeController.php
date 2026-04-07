<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index() {
    $employees = Employee::all();
    return view('employees.index', compact('employees'));
}

public function create() {
    return view('employees.create');
}

public function store(Request $request) {
    $data = $request->validate([
        'full_name'  => 'required',
        'email'      => 'required|email|unique:employees',
        'password'   => 'required|min:8',
        'department' => 'required|in:Admin,Sales,Purchasing,Warehouse,Route',
    ]);
    $data['password_hash'] = bcrypt($data['password']);
    unset($data['password']);
    Employee::create($data);
    return redirect()->route('employees.index')->with('success', 'User created.');
}

public function edit(Employee $employee) {
    return view('employees.edit', compact('employee'));
}

public function update(Request $request, Employee $employee) {
    $data = $request->validate([
        'full_name'  => 'required',
        'department' => 'required|in:Admin,Sales,Purchasing,Warehouse,Route',
        'is_active'  => 'boolean',
    ]);
    $employee->update($data);
    return redirect()->route('employees.index')->with('success', 'User updated.');
}
}
