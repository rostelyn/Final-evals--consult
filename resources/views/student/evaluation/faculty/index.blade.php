@extends('layouts.evaluation-layout')

@section('content')
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
@endsection


