@extends('layouts.hr-layout')

@section('content')
<h1>STUDENT EVALUATION AND CONSULTATION</h1>
<h2>GRADE LEVEL</h2>
    <div>
        <a href="{{ route('hrHS-G7level') }}">
            <button>GRADE 7</button>
        </a>
        <a href="{{ route('hrHS-G8level') }}">
            <button>GRADE 8</button>
        </a>
        <a href="{{ route('hrHS-G9level') }}">
            <button>GRADE 9</button>
        </a>
        <a href="{{ route('hrHS-G10level') }}">
            <button>GRADE 10</button>
        </a>
        <a href="{{ route('hrHS-G11level') }}">
            <button>GRADE 11</button>
        </a>
        <a href="{{ route('hrHS-G12level') }}">
            <button>GRADE 12</button>
    </div>
@endsection