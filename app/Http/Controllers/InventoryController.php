<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    //
    public function index()
    {
        return Inventory::all();
    }

    public function show($id)
    {
        return Inventory::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'expiration_date' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
        ]);

        $inventory = Inventory::create($validated);
        return response()->json($inventory, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'quantity' => 'sometimes|required|integer',
            'price' => 'sometimes|required|numeric',
            'expiration_date' => 'nullable|date',
            'user_id' => 'sometimes|required|exists:users,id',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($validated);
        return response()->json($inventory);
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();
        return response()->json(null, 204);
    }
}
