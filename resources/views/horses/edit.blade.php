@extends('layouts.app')

@section('title', 'Edit Horse')

@section('content')
    <h2>Edit Horse</h2>
    @include('horses._form', [
        'route' => route('horses.update', $horse),
        'method' => 'PUT',
        'horse' => $horse
    ])
@endsection
