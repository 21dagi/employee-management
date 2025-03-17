<?php
// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use App\Models\EventBoard;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create()
    {
        return view('admin.event_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_title' => 'required|string|max:255',
            'event_description' => 'required|string',
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'organizer' => 'required|string|max:255',
        ]);

        EventBoard::create($request->all());

        return redirect()->route('events.create')->with('success', 'Event created successfully.');
    }
}