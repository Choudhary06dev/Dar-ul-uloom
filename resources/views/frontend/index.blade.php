@extends('layouts.frontend')

@section('title', 'Frontend - Home')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Frontend Dashboard</h1>
            <p>Welcome to the frontend application!</p>
            <a href="{{ route('frontend.about') }}" class="btn btn-primary">About</a>
            <a href="{{ route('frontend.contact') }}" class="btn btn-secondary">Contact</a>
        </div>
    </div>
</div>
@endsection
