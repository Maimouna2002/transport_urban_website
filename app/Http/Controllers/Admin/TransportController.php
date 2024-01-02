<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use App\Models\Company;

class TransportController extends Controller
{
  public function index()
  {
      $transports = Transport::with('company')->orderBy('id', 'desc')->get();

      return view('content.transports.index', compact('transports'));
  }
    public function create()
    {
        $companies = Company::all();
        return view('content.transports.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',
        ]);

        Transport::create([
            'name' => $request->name,
            'status' => $request->status ?? 'active',
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('transports.index')->withSuccess(__('Nouveau transport ajouté avec succès.'));
    }

    public function edit(Transport $transport)
    {
        $companies = Company::all();

        return view('content.transports.edit', compact('transport', 'companies'));
    }

    public function update(Request $request, Transport $transport)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',
        ]);

        $transport->update([
            'name' => $request->name,
            'status' => $request->status ?? 'active',
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('transports.index')->withSuccess(__('Transport mis à jour avec succès.'));
    }

    public function destroy(Transport $transport)
    {
        $transport->delete();

        return redirect()->route('transports.index')->withSuccess(__('Transport supprimé avec succès.'));
    }
}
