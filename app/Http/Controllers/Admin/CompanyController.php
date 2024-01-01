<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use App\Models\Company;
use App\Models\Itinerary;


class CompanyController extends Controller
{
    public function create()
    {
        $itineraries = Itinerary::all();
        $companies = Company::all();
        return view('content.companies.create', compact('itineraries'));
    }

    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->localisation = $request->localisation;
        $company->contact = $request->contact;
        $company->status = $request->status ?? 'active';
        $company->save();

        // Attachez des itinéraires à cette compagnie
        $company->itineraries()->attach($request->input('itinerary_id', []));

        return redirect()->route('companies.index')->withSuccess(__('Nouvelle compagnie ajoutée avec succès.'));
    }

    public function update(Request $request, Company $company)
    {
        $company->name = $request->name;
        $company->localisation = $request->localisation;
        $company->contact = $request->contact;
        $company->status = $request->status ?? 'active';
        $company->save();

        // Mettez à jour les itinéraires liés à cette compagnie
        $company->itineraries()->sync($request->input('itinerary_id', []));

        return redirect()->route('companies.index')->withSuccess(__('Compagnie mise à jour avec succès.'));
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->withSuccess(__('Compagnie supprimée avec succès.'));
    }

    public function index()
    {
        $companies = Company::with('itineraries')->orderBy('id', 'desc')->get();

        return view('content.companies.index', compact('companies'));
    }

    public function edit(Company $company)
    {
        $itineraries = Itinerary::all();
        $selectedItineraries = $company->itineraries->pluck('id')->toArray();

        return view('content.companies.edit', compact('company', 'itineraries', 'selectedItineraries'));
    }
    /*public function show($id)
    {
        $company = Company::findOrFail($id);

        // Utilisation de la méthode count pour obtenir le nombre d'itinéraires associés à une entreprise
        $itinerariesCount = $company->itineraries->count();

        return view('content.companies.show', compact('company', 'itinerariesCount'));
    }*/
    public function count()
    {
        // Compter le nombre d'offres
        $nombreCompanies = Company::count();

        // Retourner le nombre d'offres
        return $nombreCompanies;
    }
}
