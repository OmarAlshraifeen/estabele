@extends('layouts.app')

@section('title', 'Paths')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Paths</h2>
        <a href="{{ route('paths.create') }}" class="btn btn-primary">Add New Path</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Duration (min)</th>
                <th>Price</th>
                <th>Stable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paths as $path)
                <tr>
                    <td>{{ $path->id }}</td>
                    <td>{{ $path->name }}</td>
                    <td>{{ $path->duration_minutes }}</td>
                    <td>${{ $path->price }}</td>
                    <td>{{ $path->stable->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('paths.edit', $path) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('paths.destroy', $path) }}" method="POST" style="display:inline;">
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
