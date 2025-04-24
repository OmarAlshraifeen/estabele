@extends('layouts.app')

@section('title', 'Edit Stable')

@section('content')
    <h2>Edit Stable</h2>
    @include('stables._form', [
        'route' => route('stables.update', $stable),
        'method' => 'PUT',
        'stable' => $stable
    ])
@endsection
