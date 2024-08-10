@extends('layouts.evaluation-layout')

@section('content')
    <h1>Select Department</h1>

    <div style="padding: 20px;">
        @foreach($departments as $department)
            <div style="margin-bottom: 20px;">
                <a href="{{ url('/faculty/'.$department) }}" style="font-size: 1.2rem; display: block;">
                    {{ $department }}
                </a>
            </div>
        @endforeach
    </div>
@endsection
