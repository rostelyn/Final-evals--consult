@extends('layouts.evaluation-layout')

@section('content')

<style>
    body {
        background-color: #f8f9fa;
    }
    .container h1 {
        font-size: 2rem;
        font-weight: bold;
        color: #343a40;
    }
    .btn-block {
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }
    .btn-block:hover {
        background-color: #28a745;
        color: #fff;
    }
</style>

<div class="container-fluid d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="bg-white p-5 rounded shadow-lg" style="max-width: 600px;">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-4">
                    <h1>Select Department</h1>
                </div>
                @foreach($departments as $department)
                    <div class="col-md-6 mb-3">
                        <a href="{{ url('/faculty/'.$department) }}" class="btn btn-success btn-block py-3">{{ $department }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
