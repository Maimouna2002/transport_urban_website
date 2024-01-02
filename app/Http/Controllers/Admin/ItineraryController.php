<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Itinerary;
use App\Models\Stop;
use App\Models\Schedule;

class ItineraryController extends Controller
{
    public function create()
    {
        $stops = Stop::all();
        $schedules = Schedule::all();

        return view('content.itineraries.create', compact('stops', 'schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departure_point' => 'required|string|max:255',
            'arrival_point' => 'required|string|max:255',
            'stop_id' => 'required|array',
            'stop_id.*' => 'exists:stops,id',
            'schedule_id' => 'required|array',
            'schedule_id.*' => 'exists:schedules,id',
        ]);

        $itinerary = new Itinerary();
        $itinerary->departure_point = $request->departure_point;
        $itinerary->arrival_point = $request->arrival_point;
        $itinerary->save();

        $itinerary->stops()->attach($request->input('stop_id', []));
        $itinerary->schedules()->attach($request->input('schedule_id', []));

        return redirect()->route('itineraries.index')->withSuccess(__('Nouvel itinéraire ajouté avec succès.'));
    }

    public function update(Request $request, Itinerary $itinerary)
    {
        $request->validate([
            'departure_point' => 'required|string|max:255',
            'arrival_point' => 'required|string|max:255',
            'stop_id' => 'required|array',
            'stop_id.*' => 'exists:stops,id',
            'schedule_id' => 'required|array',
            'schedule_id.*' => 'exists:schedules,id',
        ]);

        $itinerary->departure_point = $request->departure_point;
        $itinerary->arrival_point = $request->arrival_point;
        $itinerary->save();

        $itinerary->stops()->sync($request->input('stop_id', []));
        $itinerary->schedules()->sync($request->input('schedule_id', []));

        return redirect()->route('itineraries.index')->withSuccess(__('Itinéraire mis à jour avec succès.'));
    }

    public function destroy(Itinerary $itinerary)
    {
        $itinerary->delete();

        return redirect()->route('itineraries.index')->withSuccess(__('Itinéraire supprimé avec succès.'));
    }

    public function index()
    {
        $itineraries = Itinerary::with('stops','schedules')->orderBy('id', 'desc')->get();

        return view('content.itineraries.index', compact('itineraries'));
    }

    public function edit(Itinerary $itinerary)
    {
        $stops = Stop::all();
        $schedules = Schedule::all();
        $selectedStops = $itinerary->stops->pluck('id')->toArray();
        $selectedSchedules = $itinerary->schedules->pluck('id')->toArray();

        return view('content.itineraries.edit', compact('itinerary', 'stops', 'schedules', 'selectedStops', 'selectedSchedules'));
    }
    public function count()
    {
        // Compter le nombre d'offres
        $nombreItineraries = Itinerary::count();

        // Retourner le nombre d'offres
        return $nombreItineraries;
    }
}
