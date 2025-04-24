@extends('layouts.app')

@section('title', 'Create Path')

@section('content')
    <h2>Create New Path</h2>
    @include('paths._form', ['route' => route('paths.store'), 'method' => 'POST'])
@endsection
