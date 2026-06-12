<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IncidentTypeRequest;
use App\Models\IncidentType;

class IncidentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidentTypes = IncidentType::latest()->paginate(10);

        return view('incident-types.index', compact('incidentTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incident-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncidentTypeRequest $request)
    {
        IncidentType::create($request->validated());

        return redirect()
            ->route('incident-types.index')
            ->with('success', 'Tipo de incidencia creada correctamente');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncidentType $incidentType)
    {
        return view('incident-types.edit', compact('incidentType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IncidentTypeRequest $request, IncidentType $incidentType)
    {
        $incidentType->update($request->validated());

        return redirect()
            ->route('incident-types.index')
            ->with('success', 'Tipo de incidencia actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncidentType $incidentType)
    {
        $incidentType->delete();

        return redirect()
            ->route('incident-types.index')
            ->with('success', 'Tipo de incidencia eliminada correctamente');
    }
}
