@extends('layouts.frontend')

@section('title', 'Frontend - Contact')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Us</h1>
            <p>Please get in touch with us using the form below.</p>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a href="{{ route('frontend.index') }}" class="btn btn-secondary mt-3">Back to Home</a>
        </div>
    </div>
</div>
@endsection
