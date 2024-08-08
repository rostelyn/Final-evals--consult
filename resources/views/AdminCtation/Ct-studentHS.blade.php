@extends('layouts.AdminConsult-layout')

@section('content')
<h1>STUDENT EVALUATION AND CONSULTATION</h1>
    <div>
        <a href="{{ route('Consult-bsit') }}">
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