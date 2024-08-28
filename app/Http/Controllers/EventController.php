<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        return Event::all();
    }
    public function show($id)
    {
        return Event::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'required|date',
            'end' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
            'company_id' => 'required|exists:company,id',
        ]);

        $event = Event::create($validated);
        return response()->json($event, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'start' => 'sometimes|required|date',
            'end' => 'nullable|date',
            'user_id' => 'sometimes|required|exists:users,id',
            'company_id' => 'sometimes|required|exists:company,id',
        ]);

        $event = Event::findOrFail($id);
        $event->update($validated);
        return response()->json($event);
    }
    public function showEventsByCompany($id)
    {
        $events = Event::where('company_id', $id)->orderBy('start')->get();
        return response()->json($events);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(null, 204);
    }
}
