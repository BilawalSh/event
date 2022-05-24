<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'time' => 'required',
            'date' => 'required'
        ]);

        Event::create([
            'email' => $request->email,
            'subject' => $request->subject,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        $response = Http::withHeaders([
            'X-First' => 'foo',
            'X-Second' => 'bar'
        ])->post('https://www.googleapis.com/calendar/v3/calendars/primary/events', [
            'name' => 'Steve',
            'role' => 'Network Administrator',
        ]);

        return back()->with('success', 'Meeting Schedule');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'time' => 'required',
            'date' => 'required'
        ]);

        $event = Event::find($id);

        $event->update($request->all());

        return back()->with('success', 'Schedule Meeting Successfully update');
    }

    public function destroy($id)
    {
        $event = Event::find($id);

        $event->delete();

        return back()->with('success', 'Event deleted successfully');
    }
}
