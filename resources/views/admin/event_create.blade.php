
@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
        <h2>Create Event</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="event_title">Event Title</label>
                <input type="text" class="form-control" id="event_title" name="event_title" required>
            </div>

            <div class="form-group">
                <label for="event_description">Event Description</label>
                <textarea class="form-control" id="event_description" name="event_description" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" class="form-control" id="event_date" name="event_date" required>
            </div>

            <div class="form-group">
                <label for="event_time">Event Time</label>
                <input type="time" class="form-control" id="event_time" name="event_time" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <div class="form-group">
                <label for="organizer">Organizer</label>
                <input type="text" class="form-control" id="organizer" name="organizer" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>

    @endsection