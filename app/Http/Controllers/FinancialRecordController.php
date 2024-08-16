<?php

namespace App\Http\Controllers;

use App\Models\FinancialRecord;
use Illuminate\Http\Request;

class FinancialRecordController extends Controller
{
    //
    public function index()
    {
        return FinancialRecord::all();
    }

    public function show($id)
    {
        return FinancialRecord::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $record = FinancialRecord::create($validated);
        return response()->json($record, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'type' => 'sometimes|required|string',
            'amount' => 'sometimes|required|numeric',
            'description' => 'nullable|string',
            'date' => 'sometimes|required|date',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $record = FinancialRecord::findOrFail($id);
        $record->update($validated);
        return response()->json($record);
    }

    public function destroy($id)
    {
        $record = FinancialRecord::findOrFail($id);
        $record->delete();
        return response()->json(null, 204);
    }
}
