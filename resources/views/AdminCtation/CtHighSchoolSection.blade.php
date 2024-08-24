@extends('layouts.AdminConsult-layout')

@section('content')
<h1>STUDENT EVALUATION AND CONSULTATION</h1>
<h2>GRADE LEVEL</h2>
    <div>
        <a href="{{ route('CTHS-G7level') }}">
            <button>GRADE 7</button>
        </a>
        <a href="{{ route('CTHS-G8level') }}">
            <button>GRADE 8</button>
        </a>
        <a href="{{ route('CTHS-G9level') }}">
            <button>GRADE 9</button>
        </a>
        <a href="{{ route('CTHS-G10level') }}">
            <button>GRADE 10</button>
        </a>
        <a href="{{ route('CTHS-G11level') }}">
            <button>GRADE 11</button>
        </a>
        <a href="{{ route('CTHS-G12level') }}">
            <button>GRADE 12</button>
    </div>
@endsection