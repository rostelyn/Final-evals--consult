@extends('layouts.AdminConsult-layout')

@section('content')
<h1>STUDENT EVALUATION AND CONSULTATION</h1>
<h2>BSIT 101</h2>
<div class="bsit-consultation-page bsit101">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->name }}</td>
                    <td class="actions">
                        <a href="{{ route('student.profile', ['student_id' => $student->id, 'level' => '101']) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
