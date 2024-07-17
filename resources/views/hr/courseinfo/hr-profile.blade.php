@extends('layouts.hr-layout')

@section('content')
    <h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <div>
        <div>
            <label for="picture">1x1 Picture</label>
            <input type="file" id="picture" name="picture">
        </div>
        <div>
            <label for="gender">Gender</label>
            <input type="text" id="gender" name="gender" value="Male" readonly>
        </div>
        <div>
            <label for="student_number">Student Number</label>
            <input type="text" id="student_number" name="student_number" value="21-1111" readonly>
        </div>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="DENN HARNEZ ESCAT" readonly>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="denharnez@outlook.com" readonly>
        </div>
    </div>
    <div>
        <h2>List of Teachers</h2>
        <table>
            <thead>
                <tr>
                    <th>Name of Teacher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Teacher Name</td>
                    <td>
                        <a href="#">
                            <button>Current Evaluation</button>
                        </a>
                        <a href="#">
                            <button>Past Evaluation</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
