@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
    <h2>Edit Booking</h2>
    @include('bookings._form', [
        'route' => route('bookings.update', $booking),
        'method' => 'PUT',
        'booking' => $booking
    ])
@endsection
