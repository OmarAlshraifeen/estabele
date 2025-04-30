@extends('layouts.app')

@section('title', 'Create Booking')

@section('content')
    <h2>Create New Booking</h2>
    @include('bookings._form', ['route' => route('bookings.store'), 'method' => 'POST'])
@endsection
