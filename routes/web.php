<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\WorkScheduleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IncidentTypeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function() {
    Route::resource('departments', DepartmentController::class)->except('show');
    Route::resource('positions', PositionController::class)->except('show');
    Route::resource('work-schedules', WorkScheduleController::class)->except('show');
    Route::resource('incident-types', IncidentTypeController::class)->except('show');
    Route::resource('employees', EmployeeController::class);
    Route::resource('attendances', AttendanceController::class)->except('show');
    Route::resource('incidents', IncidentController::class)->except('show');
});

require __DIR__.'/auth.php';
