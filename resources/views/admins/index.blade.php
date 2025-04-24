@extends('layouts.app')

@section('title', 'Admins')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Admins</h2>
        <a href="{{ route('admins.create') }}" class="btn btn-primary">Add New Admin</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ route('admins.edit', $admin) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admins.destroy', $admin) }}" method="POST" style="display:inline;">
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
