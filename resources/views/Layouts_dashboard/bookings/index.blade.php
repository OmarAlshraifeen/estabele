@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Bookings</h2>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">Add New Booking</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Horse</th>
                <th>Path</th>
                <th>Start Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name ?? 'N/A' }}</td>
                    <td>{{ $booking->horse->name ?? 'N/A' }}</td>
                    <td>{{ $booking->path->name ?? 'N/A' }}</td>
                    <td>{{ $booking->start_time }}</td>
                    <td>{{ ucfirst($booking->status) }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
