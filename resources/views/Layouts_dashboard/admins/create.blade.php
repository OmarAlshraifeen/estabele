@extends('layouts.app')

@section('title', 'Create Admin')

@section('content')
    <h2>Create New Admin</h2>
    @include('admins._form', ['route' => route('admins.store'), 'method' => 'POST'])
@endsection
