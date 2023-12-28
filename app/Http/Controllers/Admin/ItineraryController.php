<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Itinerary;
use App\Models\Stop;

class ItineraryController extends Controller
{
    public function create()
    {
        $companies = Company::all();
        $itineraries = Itinerary::all();
        $stops = Stop::all(); // Chargez les arrêts

        return view('content.itineraries.create', compact('companies', 'itineraries', 'stops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departure_point' => 'required|string|max:255',
            'arrival_point' => 'required|string|max:255',
            'stop_id' => 'required|array', // Utilisez 'stop_ids' au lieu de 'stop_id'
            'stop_id.*' => 'exists:stops,id', // Validez chaque élément du tableau
            'company_id' => 'required|array',
            'company_id.*' => 'exists:companies,id',
        ]);

        $itinerary = new Itinerary();
        $itinerary->departure_point = $request->departure_point;
        $itinerary->arrival_point = $request->arrival_point;
        // Ajoutez d'autres champs au besoin
        $itinerary->save();

        // Attachez des arrêts à cet itinéraire
        $itinerary->stops()->attach($request->input('stop_id', []));

        // Attachez des compagnies à cet itinéraire
        $itinerary->companies()->attach($request->input('company_id', []));

        return redirect()->route('itineraries.index')->withSuccess(__('Nouvel itinéraire ajouté avec succès.'));
    }

    public function update(Request $request, Itinerary $itinerary)
    {
        $request->validate([
            'departure_point' => 'required|string|max:255',
            'arrival_point' => 'required|string|max:255',
            'stop_id' => 'required|array',
            'stop_id.*' => 'exists:stops,id',
            'company_id' => 'required|array',
            'company_id.*' => 'exists:companies,id',
        ]);

        $itinerary->departure_point = $request->departure_point;
        $itinerary->arrival_point = $request->arrival_point;
        // Mettez à jour d'autres champs au besoin
        $itinerary->save();

        // Mettez à jour les arrêts liés à cet itinéraire
        $itinerary->stops()->sync($request->input('stop_id', []));

        // Mettez à jour les compagnies liées à cet itinéraire
        $itinerary->companies()->sync($request->input('company_id', []));

        return redirect()->route('itineraries.index')->withSuccess(__('Itinéraire mis à jour avec succès.'));
    }

    public function destroy(Itinerary $itinerary)
    {
        $itinerary->delete();

        return redirect()->route('itineraries.index')->withSuccess(__('Itinéraire supprimé avec succès.'));
    }

    public function index()
    {
        // Charger les itinéraires avec les arrêts et les compagnies associées
        $itineraries = Itinerary::with('stops', 'companies')->orderBy('id', 'desc')->get();

        return view('content.itineraries.index', compact('itineraries'));
    }

    public function edit(Itinerary $itinerary)
    {
        $companies = Company::all();
        $stops = Stop::all();
        $selectedCompanies = $itinerary->companies->pluck('id')->toArray();
        $selectedStops = $itinerary->stops->pluck('id')->toArray();

        return view('content.itineraries.edit', compact('itinerary', 'companies', 'stops', 'selectedCompanies', 'selectedStops'));
    }
}
