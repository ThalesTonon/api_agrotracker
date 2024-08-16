<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    //
    public function index()
    {
        return Equipment::all();
    }

    public function show($id)
    {
        return Equipment::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'acquisition_date' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $equipment = Equipment::create($validated);
        return response()->json($equipment, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'acquisition_date' => 'nullable|date',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $equipment = Equipment::findOrFail($id);
        $equipment->update($validated);
        return response()->json($equipment);
    }

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();
        return response()->json(null, 204);
    }
}
