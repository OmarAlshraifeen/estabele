@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <h2>Create New User</h2>
    @include('users._form', ['route' => route('users.store'), 'method' => 'POST'])
@endsection
