@extends('layouts.app')

@section('title', 'Create Horse')

@section('content')
    <h2>Create New Horse</h2>
    @include('horses._form', ['route' => route('horses.store'), 'method' => 'POST'])
@endsection
