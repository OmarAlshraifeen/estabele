@extends('layouts.app')

@section('title', 'Edit Admin')

@section('content')
    <h2>Edit Admin</h2>
    @include('admins._form', [
        'route' => route('admins.update', $admin),
        'method' => 'PUT',
        'admin' => $admin
    ])
@endsection
