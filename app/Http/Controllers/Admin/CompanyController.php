<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Affiche une liste des entreprises.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->get();

        return view('content.companies.index', compact('companies'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle entreprise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.companies.create');
    }

    /**
     * Enregistre une nouvelle entreprise.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        Company::create($request->all());

        return redirect()->route('companies.index')->withSuccess(__('New Company Added Successfully.'));
    }

    /**
     * Affiche les détails d'une entreprise spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('content.companies.show', compact('company'));
    }

    /**
     * Affiche le formulaire d'édition d'une entreprise spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function count()
{
    // Compter le nombre de compagnies
    $nombreCompagnies = Company::count();

    // Retourner le nombre de compagnies
    return $nombreCompagnies;
}

    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('content.companies.edit', compact('company'));
    }

    /**
     * Met à jour une entreprise spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $company->update($request->all());

        return redirect()->route('companies.index')->withSuccess(__('Company Updated Successfully.'));
    }

    /**
     * Supprime une entreprise spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')->withSuccess(__('Company Deleted Successfully.'));
    }
}
