@extends('layouts.evaluation-layout')

@section('content')

<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />

    <!-- Main Content -->
    <div class="flex-fill d-flex align-items-center justify-content-center" style="background-color: #F5F7E7;">
        <div class="container">

        <div class="col-12 text-center mb-4">
                    <h1>Select Department</h1>
        </div>

            <div class="row">
                @foreach($departments as $department)
                    <div class="col-md-6 mb-3 d-flex justify-content-center">
                        <a href="{{ url('/faculty/'.$department) }}" class="btn btn-success btn-lg" style="min-width: 150px; min-height: 75px; font-size: 1.2rem; background-color: #28a745; border: none; display: flex; align-items: center; justify-content: center;">
                            {{ $department }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
