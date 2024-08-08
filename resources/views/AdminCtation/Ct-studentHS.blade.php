@extends('layouts.AdminConsult-layout')

@section('content')
<h1>STUDENT EVALUATION AND CONSULTATION</h1>
<h2>GRADE LEVEL</h2>
    <div>
        <a href="{{ route('CTHS-G7section') }}">
            <button>GRADE 7</button>
        </a>
        <a href="#">
            <button>GRADE 8</button>
        </a>
        <a href="#">
            <button>GRADE 9</button>
        </a>
        <a href="#">
            <button>GRADE 10</button>
        </a>
        <a href="#">
            <button>GRADE 11</button>
        </a>
        <a href="#">
            <button>GRADE 12</button>
    </div>
@endsection