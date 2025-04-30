@extends('layouts.app')

@section('title', 'Create Stable')

@section('content')
    <h2>Create New Stable</h2>
    @include('stables._form', ['route' => route('stables.store'), 'method' => 'POST'])
@endsection
