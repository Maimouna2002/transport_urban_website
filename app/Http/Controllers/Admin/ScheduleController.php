<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Itinerary;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function create()
    {
        $itineraries = Itinerary::all();
        $schedules = Schedule::all();
        return view('content.schedules.create', compact('itineraries'));
    }

    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->departure_time = $request->departure_time;
        $schedule->arrival_time = $request->arrival_time;
        $schedule->save();

        // Attachez des itinéraires à cette planification
        $schedule->itineraries()->attach($request->input('itinerary_id', []));

        return redirect()->route('schedules.index')->withSuccess(__('Nouvelle planification ajoutée avec succès.'))->with('scheduleId', $schedule->id);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $schedule->departure_time = $request->departure_time;
        $schedule->arrival_time = $request->arrival_time;
        $schedule->save();

        // Mettez à jour les itinéraires liés à cette planification
        $schedule->itineraries()->sync($request->input('itinerary_id', []));

        return redirect()->route('schedules.index')->withSuccess(__('Planification mise à jour avec succès.'));
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->withSuccess(__('Planification supprimée avec succès.'));
    }

    public function index()
    {
        $schedules = Schedule::with('itineraries')->orderBy('id', 'desc')->get();

        return view('content.schedules.index', compact('schedules'));
    }

    public function edit(Schedule $schedule)
    {
        $itineraries = Itinerary::all();
        $selectedItineraries = $schedule->itineraries->pluck('id')->toArray();

        return view('content.schedules.edit', compact('schedule', 'itineraries', 'selectedItineraries'));
    }
}
