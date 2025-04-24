@extends('layouts.app')

@section('title', 'Dashboard')
@include('layouts.navbar')
@section('content')
    <h2 class="mb-4">Welcome to Admin Dashboard</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text fs-4">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Bookings</h5>
                    <p class="card-text fs-4">{{ $bookingCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Horses</h5>
                    <p class="card-text fs-4">{{ $horseCount }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
