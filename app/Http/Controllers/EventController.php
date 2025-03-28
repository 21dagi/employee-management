<?php

namespace App\Http\Controllers;

use App\Models\EventBoard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // No need for manual middleware - handled by routes
    }

    public function create()
    {
        return view('admin.event_create');
    }

    public function store(Request $request)
    {
        // Validate with stricter rules
        $validator = Validator::make($request->all(), [
            'event_title' => 'required|string|max:255|regex:/^[\pL\s\-\.\']+$/u',
            'event_description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (Str::contains($value, ['<script>', 'javascript:', 'onload='])) {
                        $fail('The '.$attribute.' contains invalid content.');
                    }
                }
            ],
            'event_date' => [
                'required',
                'date',
                'after_or_equal:today'
            ],
            'event_time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255|regex:/^[\pL\s\-\.,0-9]+$/u',
            'organizer' => 'required|string|max:255|regex:/^[\pL\s\-\.]+$/u',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            Log::warning('Event creation validation failed', [
                'errors' => $validator->errors(),
                'ip' => $request->ip(),
                'user_id' => Auth::id()
            ]);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Process image securely if exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store(
                'event_images',
                'public' // Configurable disk
            );
        }

        // Create event with only validated fields
        $event = EventBoard::create([
            'event_title' => strip_tags($request->event_title),
            'event_description' => clean($request->event_description), // Using HTML Purifier
            'event_date' => Carbon::parse($request->event_date)->format('Y-m-d'),
            'event_time' => $request->event_time,
            'location' => strip_tags($request->location),
            'organizer' => strip_tags($request->organizer),
            'image_path' => $imagePath,
            'user_id' => Auth::id() // Track creator
        ]);

        Log::info('Event created', [
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'ip' => $request->ip()
        ]);

        return redirect()->route('events.create')
            ->with('success', 'Event created successfully.')
            ->header('X-Content-Type-Options', 'nosniff');
    }
}