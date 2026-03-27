@extends('layouts.frontend')

@section('title', 'Frontend - About')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>About Us</h1>
            <p>This is the about page of our frontend application.</p>
            <a href="{{ route('frontend.index') }}" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
</div>
@endsection
