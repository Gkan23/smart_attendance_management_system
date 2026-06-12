<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\WorkSchedule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with([
            'department',
            'position',
            'workSchedule',
        ])->latest()->paginate(10);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::orderBy('name')->get();

        $positions = Position::orderBy('name')->get();

        $workSchedules = WorkSchedule::orderBy('name')->get();

        return view('employees.create', compact('departments', 'positions', 'workSchedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->validated());

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('name')->get();

        $positions = Position::orderBy('name')->get();

        $workSchedules = WorkSchedule::orderBy('name')->get();

        return view('employees.edit', compact('employee', 'departments', 'positions', 'workSchedules'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Empleado eliminado correctamente');
    }
}
