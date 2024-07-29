@extends('layouts.evaluation-layout')

@section('content')
<body>
    <header>
        STUDENT EVALUATION AND CONSULTATION
    </header>
    <div class="main-container">
                <ul>
                    @if(auth()->check())
                    <li><a href="{{route('logout')}}">Log Out</a></li>
                    @else
                    <li><a href="{{ route('login') }}">Log In</a></li>
                    <li><a href="{{ route('registration') }}">Register</a></li>
                    @endif
                </ul>
        <button>About</button>
    </div>
</body>
</html>
@endsection