@extends('layouts.HrLayout')

@section('content')
    <div class="container mt-5">
        <h2>Recent Evaluations</h2>

        @if($recentEvaluationsCount > 0)
            <div class="alert alert-info mt-4">
                <strong>Recent Evaluations:</strong>
                <ul>
                    @foreach($recentEvaluations as $evaluation)
                        <li>
                            <strong>{{ $evaluation->teacher_name }}</strong> - 
                            {{ $evaluation->subject }} evaluation 
                            (Submitted on {{ $evaluation->created_at->format('Y-m-d H:i:s') }})
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="alert alert-info">
                <strong>No recent evaluations available.</strong>
            </div>
        @endif
    </div>
@endsection
