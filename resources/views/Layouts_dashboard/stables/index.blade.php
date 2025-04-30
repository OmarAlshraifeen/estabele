@extends('layouts.app')

@section('title', 'All Stables')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>All Stables</h2>
        <a href="{{ route('stables.create') }}" class="btn btn-primary">Add New Stable</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Location</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stables as $stable)
                <tr>
                    <td>{{ $stable->id }}</td>
                    <td>{{ $stable->name }}</td>
                    <td>{{ $stable->location }}</td>
                    <td>{{ $stable->admin->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('stables.edit', $stable) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('stables.destroy', $stable) }}" method="POST" style="display:inline;">
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
