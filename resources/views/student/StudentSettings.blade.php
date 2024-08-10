@extends('layouts.evaluation-layout')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
<body>
    <header>
        STUDENT EVALUATION AND CONSULTATION
    </header>
    <div class="main-container">
                <ul>
                    <li><a href="{{route('logout')}}">Log Out</a></li>
                </ul>
        <button>About</button>
    </div>
</body>
</html>
@endsection