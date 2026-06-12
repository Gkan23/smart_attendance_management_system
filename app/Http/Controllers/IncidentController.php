<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IncidentRequest;
use App\Models\Incident;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidents = Incident::latest()->paginate(10);
        return view('incidents.index', compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IncidentRequest $request)
    {
        $data = $request->validated();

        $data['registered_by'] = auth()->id();

        Incident::create($data);

        return redirect()
            ->route('incidents.index')
            ->with('success', 'Incidencia creada correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        return view('incidents.edit', compact('incident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $incident->update($request->validated());

        return redirect()
            ->route('incidents.index')
            ->with('success', 'Incidencia actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $incident->delete();

        return redirect()
            ->route('incidents.index')
            ->with('success', 'Incidencia eliminada correctamente');
    }
}
