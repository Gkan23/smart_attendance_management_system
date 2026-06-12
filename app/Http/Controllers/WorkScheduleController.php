<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WorkScheduleRequest;
use App\Models\WorkSchedule;
use Carbon\Carbon;

class WorkScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workSchedules = WorkSchedule::latest()->paginate(10);
        return view('work-schedules.index', compact('workSchedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('work-schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WorkScheduleRequest $request)
    {
        $data = $request->validated();

        $totalMinutes = $this->getTotalMinutes(
            $data['start_time'],
            $data['end_time'],
        );

        if ($data['break_minutes'] >= $totalMinutes) {
            return back()
                ->withErrors([
                    'break_minutes' => 'El descanso no puede ser mayor o igual a la jornada laboral'
                ])
                ->withInput();
        }

        $data['daily_hours'] = $this->calculateHours(
            $totalMinutes,
            $data['break_minutes'],
        );

        WorkSchedule::create($data);

        return redirect()
            ->route('work-schedules.index')
            ->with('success', 'Horario creado correctamente');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkSchedule $workSchedule)
    {
        return view('work-schedules.edit', compact('workSchedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WorkScheduleRequest $request, WorkSchedule $workSchedule)
    {

        $data = $request->validated();

        $totalMinutes = $this->getTotalMinutes(
            $data['start_time'],
            $data['end_time'],
        );

        if ($data['break_minutes'] >= $totalMinutes) {
            return back()
                ->withErrors([
                    'break_minutes' => 'El descanso no puede ser mayor o igual a la jornada laboral'
                ])
                ->withInput();
        }

        $data['daily_hours'] = $this->calculateHours(
            $totalMinutes,
            $data['break_minutes'],
        );

        $workSchedule->update($data);

        return redirect()
            ->route('work-schedules.index')
            ->with('success', 'Horario actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkSchedule $workSchedule)
    {
        $workSchedule->delete();

        return redirect()
            ->route('work-schedules.index')
            ->with('success', 'Horario eliminado correctamente');
    }

    private function getTotalMinutes(string $start, string $end): int
    {
        return Carbon::parse($start)
            ->diffInMinutes(Carbon::parse($end));
    }

    private function calculateHours(int $totalMinutes, int $breakMinutes): float
    {
        return round (($totalMinutes - $breakMinutes) / 60, 2);
    }
}
