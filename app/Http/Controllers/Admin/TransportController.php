<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use App\Models\Company; // Assurez-vous d'importer le modèle Company si ce n'est pas déjà fait

class TransportController extends Controller
{
    /**
     * Affiche une liste des transports.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transports = Transport::orderBy('id', 'desc')->get();

        return view('content.transports.index', compact('transports'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau transport.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all(); // Récupérer la liste des compagnies pour le formulaire

        return view('content.transports.create', compact('companies'));
    }

    /**
     * Enregistre un nouveau transport.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'status' => 'required|in:active,inactive',
           ]);

        Transport::create($request->all());

        return redirect()->route('transports.index')->withSuccess(__('New Transport Added Successfully.'));
    }

    /**
     * Affiche les détails d'un transport spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transport = Transport::findOrFail($id);

        return view('content.transports.show', compact('transport'));
    }

    /**
     * Affiche le formulaire d'édition d'un transport spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transport = Transport::findOrFail($id);
        $companies = Company::all(); // Récupérer la liste des compagnies pour le formulaire

        return view('content.transports.edit', compact('transport', 'companies'));
    }

    /**
     * Met à jour un transport spécifique dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transport = Transport::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'status' => 'required|in:active,inactive',
          ]);

        $transport->update($request->all());

        return redirect()->route('transports.index')->withSuccess(__('Transport Updated Successfully.'));
    }

    /**
     * Supprime un transport spécifique de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transport = Transport::findOrFail($id);
        $transport->delete();

        return redirect()->route('transports.index')->withSuccess(__('Transport Deleted Successfully.'));
    }
}
