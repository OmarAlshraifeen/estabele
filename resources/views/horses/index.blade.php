@extends('layouts.app')

@section('title', 'Horses')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Horses</h2>
        <a href="{{ route('horses.create') }}" class="btn btn-primary">Add New Horse</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Stable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horses as $horse)
                <tr>
                    <td>{{ $horse->id }}</td>
                    <td>{{ $horse->name }}</td>
                    <td>{{ $horse->type }}</td>
                    <td>{{ $horse->stable->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('horses.edit', $horse) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('horses.destroy', $horse) }}" method="POST" style="display:inline;">
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
