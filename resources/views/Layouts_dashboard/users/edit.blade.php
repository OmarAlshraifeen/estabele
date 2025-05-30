@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <h2>Edit User</h2>
    @include('users._form', [
        'route' => route('users.update', $user),
        'method' => 'PUT',
        'user' => $user
    ])
@endsection
