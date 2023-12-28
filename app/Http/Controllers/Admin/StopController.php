<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Itinerary;
use App\Models\Stop;

class StopController extends Controller
{
    public function create()
    {
        $itineraries = Itinerary::all();
        $stops = Stop::all();
        return view('content.stops.create', compact('itineraries'));
    }

    public function store(Request $request)
    {
        $stop = new Stop();
        $stop->name = $request->name;
        // Ajoutez d'autres champs de la table 'stop' selon votre structure

        $stop->save();

        // Attachez des itinéraires à cet arrêt
        $stop->itineraries()->attach($request->input('itinerary_id', []));

        return redirect()->route('stops.index')->withSuccess(__('Nouvel arrêt ajouté avec succès.'));
    }

    public function update(Request $request, Stop $stop)
    {
        $stop->name = $request->name;
        // Mettez à jour d'autres champs de la table 'stop' selon votre structure

        $stop->save();

        // Mettez à jour les itinéraires liés à cet arrêt
        $stop->itineraries()->sync($request->input('itinerary_id', []));

        return redirect()->route('stops.index')->withSuccess(__('Arrêt mis à jour avec succès.'));
    }

    public function destroy(Stop $stop)
    {
        $stop->delete();

        return redirect()->route('stops.index')->withSuccess(__('Arrêt supprimé avec succès.'));
    }

    public function index()
    {
        $stops = Stop::with('itineraries')->orderBy('id', 'desc')->get();

        return view('content.stops.index', compact('stops'));
    }

    public function edit(Stop $stop)
    {
        $itineraries = Itinerary::all();
        $selectedItineraries = $stop->itineraries->pluck('id')->toArray();

        return view('content.stops.edit', compact('stop', 'itineraries', 'selectedItineraries'));
    }
}
