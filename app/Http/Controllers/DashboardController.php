<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Incident;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalEmployees' => Employee::count(),

            'activeEmployees' => Employee::where('status', 'Activo')->count(),

            'inactiveEmployees' => Employee::where('status', 'Inactivo')->count(),

            'todayAttendances' => Attendance::whereDate('created_at', Carbon::today())->count(),

            'recentIncidents' => Incident::latest()->take(5)->get(),
        ]);
    }
}
