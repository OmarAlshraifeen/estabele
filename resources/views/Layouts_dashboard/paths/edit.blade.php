@extends('layouts.app')

@section('title', 'Edit Path')

@section('content')
    <h2>Edit Path</h2>
    @include('paths._form', [
        'route' => route('paths.update', $path),
        'method' => 'PUT',
        'path' => $path
    ])
@endsection
