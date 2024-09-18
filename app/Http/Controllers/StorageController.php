<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use App\Models\StorageMovements;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Storage::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'quantity' => 'required|integer',
            'unitary_value' => 'required|numeric',
            'entry_date' => 'required|date',
            'expiration_date' => 'nullable|date',
            'company_id' => 'required|exists:company,id'
        ]);
        $storage = Storage::create($request->all());

        StorageMovements::create([
            'storage_id' => $storage->id,
            'quantity' => $storage->quantity,
            'type' => 'input',
            'movement_date' => $storage->entry_date
        ]);

        return response()->json($storage, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $storage = Storage::find($id);
        if ($storage) {
            return response()->json($storage, 200);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $storage = Storage::find($id);
        if ($storage) {
            $request->validate([
                'name' => 'sometimes|string|max:255',
                'description' => 'sometimes|string',
                'quantity' => 'sometimes|integer',
                'unitary_value' => 'sometimes|numeric',
                'entry_date' => 'sometimes|date',
                'expiration_date' => 'nullable|date',
                'company_id' => 'sometimes|exists:company,id'
            ]);
            if ($request->has('quantity') && $request->quantity != $storage->quantity) {
                $oldQuantity = $storage->quantity;
                $newQuantity = $request->input('quantity');
                $difference = $newQuantity - $oldQuantity;
                $type = $difference > 0 ? 'input' : 'output';
                StorageMovements::create([
                    'storage_id' => $storage->id,
                    'quantity' => abs($difference),
                    'type' => $type,
                    'movement_date' => now()
                ]);
            }

            $storage->update($request->all());
            return response()->json($storage, 200);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $storage = Storage::find($id);
        if ($storage) {
            $storage->delete();
            return response()->json(['message' => 'Produto excluído com sucesso'], 200);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }
    public function showStoragesByCompany($id)
    {
        $storages = Storage::where('company_id', $id)->orderby('name')->get();

        foreach ($storages as $storage) {
            $storage->unitary_value = number_format($storage->unitary_value, 2, ',', '.');
            $storage->entry_date = date('d/m/Y', strtotime($storage->entry_date));
            if ($storage->expiration_date) {
                $storage->expiration_date = date('d/m/Y', strtotime($storage->expiration_date));
            }
        }

        return response()->json($storages, 200);
    }

    public function movements($id)
    {
        $storage = Storage::find($id);
        if ($storage) {
            return response()->json($storage->movements, 200);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }
    public function expiringStorages($id)
    {

        $companyId = $id;
        $expirationDate = now()->addDays(7);

        $products = Storage::where('company_id', $companyId)
            ->whereNotNull('expiration_date')
            ->whereDate('expiration_date', '>=', now())
            ->whereDate('expiration_date', '<=', $expirationDate)
            ->get();

        return response()->json($products, 200);
    }
}
