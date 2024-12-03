@extends('layouts.HrLayout')

@section('content')
    <div class="container mt-5">
        <h2>Recent Evaluations</h2>

        @if($recentEvaluationsCount > 0)
            <div class="table-responsive mt-4">
                <table class="table" style="border: 1px solid black;">
                    <thead style= "color: black">
                        <tr>
                            <th style="border: 1px solid black;">Teacher Name</th>
                            <th style="border: 1px solid black;">Submission Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentEvaluations as $evaluation)
                            <tr>
                                <td>{{ $evaluation->teacher_name }}</td>
                                <td>{{ $evaluation->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info mt-4">
                <strong>No recent evaluations available.</strong>
            </div>
        @endif
    </div>
@endsection
